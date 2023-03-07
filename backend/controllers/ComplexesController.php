<?php

namespace backend\controllers;

use common\models\ApartmentImages;
use common\models\Apartments;
use common\models\ApartmentsSearch;
use common\models\Complexes;
use common\models\ComplexesSearch;
use common\models\ComplexImages;
use common\models\ComplexOptions;
use common\models\ComplexOptionsSearch;
use common\models\Options;
use common\models\Regions;
use common\service\ComplexService;
use common\service\MultipleModelService;
use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * ComplexesController implements the CRUD actions for Complexes model.
 */
class ComplexesController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Complexes models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ComplexesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Complexes model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model =  $this->findModel($id);
        $searchModel = new ApartmentsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->query->andWhere([
            'complex_id' => $model->id
        ]);
        $optionsSearch = new ComplexOptionsSearch();
        $optionsDataProvider = $optionsSearch->search($this->request->queryParams);
        $optionsDataProvider->query->andWhere([
            'complex_id' => $model->id
        ]);
        return $this->render('view', [
            'model' => $model,
            'dataProvider' => $dataProvider,
            'optionsDataProvider' => $optionsDataProvider,
        ]);
    }

    /**
     * Creates a new Complexes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Complexes();
        $options = Options::getOptionsListWithValues();
        $apartments = [new Apartments()];
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                //d(Yii::$app->request->post());
                $post = Yii::$app->request->post();
                $model->tag_ids = $post['Complexes']['tag_ids'];
                $model->options = $post['Complexes']['options'];
                $model->infrastructure_ids = $post['Complexes']['infrastructure_ids'];

                $apartments = MultipleModelService::createMultiple(Apartments::className());
                Model::loadMultiple($apartments, Yii::$app->request->post());

                $valid = $model->validate();
                $valid = Model::validateMultiple($apartments) && $valid;
                //dd('csdcs');
                if ($valid) {
                    $transaction = \Yii::$app->db->beginTransaction();
                    try {
                        if ($flag = $model->save(false)) {
                            foreach ($apartments as $apartment) {
                                $apartment->complex_id = $model->id;
                                if (! ($flag = $apartment->save(false))) {
                                    $transaction->rollBack();
                                    break;
                                }
                            }
                        }
                        if ($flag) {
                            ComplexService::saveTags($model);
                            ComplexService::saveOptions($model);
                            ComplexService::saveInfrastructures($model);
                            $transaction->commit();
                            return $this->redirect(['view', 'id' => $model->id]);
                        }
                    } catch (\Exception $e) {
                        $transaction->rollBack();
                    }
                }

                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'options' => $options,
            'apartments' => $apartments,
        ]);
    }

    /**
     * Updates an existing Complexes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $options = Options::getOptionsListWithValues();
        //dd($model->complexOptions);
        $apartments = $model->apartments;
        //dd($options);
        if (empty($apartments))
            $apartments = [new Apartments()];

        $complex_options = ComplexOptions::find()
            ->where([
                'complex_id' => $model->id
            ])->asArray()->all();


        if ($this->request->isPost && $model->load($this->request->post())) {

            $post = Yii::$app->request->post();
            $model->tag_ids = $post['Complexes']['tag_ids'];
            $model->options = $post['Complexes']['options'];
            $model->infrastructure_ids = $post['Complexes']['infrastructure_ids'];
            $oldIDs = ArrayHelper::map($apartments, 'id', 'id');

            $apartments = MultipleModelService::createMultiple(Apartments::className(),$apartments);
            Model::loadMultiple($apartments, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($apartments, 'id', 'id')));

            $valid = $model->validate();
            $valid = Model::validateMultiple($apartments) && $valid;
            if ($valid) {

                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (!empty($deletedIDs)) {
                            Apartments::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($apartments as $apartment) {
                            $apartment->complex_id = $model->id;
                            if (! ($flag = $apartment->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $model->save();
                        ComplexService::updateTagIds($model);
                        ComplexService::updateOptions($model);
                        ComplexService::updateInfrastructures($model);
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (\Exception $e) {
                    Yii::$app->session->set('error','Error');
                    $transaction->rollBack();
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $model->tag_ids = ArrayHelper::map($model->getTags()->asArray()->all(),'id','id');
        $model->infrastructure_ids = ArrayHelper::map($model->getInfrastructures()->asArray()->all(),'id','id');
        if (!empty($complex_options))
        {
            foreach ($complex_options as $complex_option)
            {
                $model->options[$complex_option['option_id']] = $complex_option['value_id'];
            }

        }

        return $this->render('update', [
            'model' => $model,
            'apartments' => $apartments,
            'options' => $options,
        ]);
    }

    /**
     * Deletes an existing Complexes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Complexes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Complexes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Complexes::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    /**
     * Finds the Complexes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Apartments the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findApartmentModel($id)
    {
        if (($model = Apartments::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionRegions()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $city_id = $parents[0];
                $out = Regions::find()
                    ->select(['id', 'name_tr as name'])
                    ->where([
                        'city_id' => $city_id
                    ])
                    ->asArray()->all();
                return ['output'=>$out, 'selected'=>''];
            }
        }
        return ['output'=>'', 'selected'=>''];
    }

    public function actionImages($id)
    {
        $model = $this->findModel($id);
        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post()))
        {
            ComplexService::saveImages($model);
            ComplexService::sortImages($model);
            return $this->redirect(['view','id' => $id]);
        }
        return $this->render('images',[
            'model' => $model
        ]);
    }
    public function actionApartmentImages($id)
    {
        $model = $this->findApartmentModel($id);
        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post()))
        {
            ComplexService::saveApartmentImages($model);
            ComplexService::sortApartmentImages($model);
            return $this->redirect(['view','id' => $model->complex_id]);
        }
        return $this->render('apartment-images',[
            'model' => $model
        ]);
    }


    public function actionUploadImages($id)
    {
        $model = $this->findModel($id);

        Yii::$app->response->format = Response::FORMAT_JSON;
        $data = [];

        if ($file_image = UploadedFile::getInstancesByName('complex_images')) {
            foreach ($file_image as $file) {
                $folder = '/complex/images/';
                $uploads_folder = Yii::getAlias('@frontend').'/web/uploads'.$folder;
                if (!file_exists($uploads_folder)) {
                    mkdir($uploads_folder, 0777, true);
                }
                $ext = pathinfo($file->name, PATHINFO_EXTENSION);
                $name = pathinfo($file->name, PATHINFO_FILENAME);
                $generateName = Yii::$app->security->generateRandomString();
                $path = $uploads_folder . $generateName . ".{$ext}";
                $file->saveAs($path);
                //dd($path);
                $data = [
                    'generate_name' => $generateName,
                    'name' => $name,
                    'path' => Yii::getAlias('@uploadsUrl') . $folder . $generateName . ".{$ext}"
                ];
            }
        }

        return $data;
    }

    public function actionDeleteImages()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();

            $complex_image = ComplexImages::find()
                ->where([
                    'generate_name' => $post['key']
                ])->one();
            $image_path = $complex_image->path;
            if ($complex_image->delete()) {
                if (file_exists(Yii::getAlias('@rootDir').$image_path))
                    unlink(Yii::getAlias('@rootDir').$image_path);
                return $post['key'];
            }
        }
        return ($post = Yii::$app->request->post()) ? $post['key'] : null;
    }

    public function actionUploadApartmentImages($id)
    {
        $model = $this->findApartmentModel($id);

        Yii::$app->response->format = Response::FORMAT_JSON;
        $data = [];

        if ($file_image = UploadedFile::getInstancesByName('complex_images')) {
            foreach ($file_image as $file) {
                $folder = '/complex/apartment-images/';
                $uploads_folder = Yii::getAlias('@frontend').'/web/uploads'.$folder;
                if (!file_exists($uploads_folder)) {
                    mkdir($uploads_folder, 0777, true);
                }
                $ext = pathinfo($file->name, PATHINFO_EXTENSION);
                $name = pathinfo($file->name, PATHINFO_FILENAME);
                $generateName = Yii::$app->security->generateRandomString();
                $path = $uploads_folder . $generateName . ".{$ext}";
                $file->saveAs($path);
                //dd($path);
                $data = [
                    'generate_name' => $generateName,
                    'name' => $name,
                    'path' => Yii::getAlias('@uploadsUrl') . $folder . $generateName . ".{$ext}"
                ];
            }
        }

        return $data;
    }

    public function actionDeleteApartmentImages()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();

            $apartment_image = ApartmentImages::find()
                ->where([
                    'generate_name' => $post['key']
                ])->one();
            $image_path = $apartment_image->path;
            if ($apartment_image->delete()) {
                if (file_exists(Yii::getAlias('@rootDir').$image_path))
                    unlink(Yii::getAlias('@rootDir').$image_path);
                return $post['key'];
            }
        }
        return ($post = Yii::$app->request->post()) ? $post['key'] : null;
    }
}
