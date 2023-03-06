<?php

namespace backend\controllers;

use common\models\Apartments;
use common\models\ApartmentsSearch;
use common\models\Complexes;
use common\models\ComplexesSearch;
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
            $oldIDs = ArrayHelper::map($apartments, 'id', 'id');

            $apartments = MultipleModelService::createMultiple(Apartments::className());
            Model::loadMultiple($apartments, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($apartments, 'id', 'id')));

            $valid = $model->validate();
            $valid = Model::validateMultiple($apartments) && $valid;
            //dd('csdcs');
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (! empty($deletedIDs)) {
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
                        ComplexService::updateTagIds($model);
                        ComplexService::updateOptions($model);
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (\Exception $e) {
                    $transaction->rollBack();
                }
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $model->tag_ids = ArrayHelper::map($model->getTags()->asArray()->all(),'id','id');
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
}
