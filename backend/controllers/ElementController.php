<?php

namespace backend\controllers;

use common\models\Element;
use common\models\ElementImages;
use common\models\ElementSearch;
use common\models\ProductImages;
use common\models\SubElement;
use Yii;
use yii\web\Controller;
use yii\web\NotAcceptableHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * ElementController implements the CRUD actions for element model.
 */
class ElementController extends Controller
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
     * Lists all element models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ElementSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single element model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new element model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Element();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                if ($model->top_element) {
                    $sub = new SubElement();
                    $sub->element_id = (int)$model->top_element;
                    $sub->sub_element_id = $model->id;
                    $sub->save();

                }
                $model->save();
                $model->saveImages();
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing element model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {

            if ($model->fat_element_id == $model->id) {
                Yii::$app->session->addFlash('error','Error the same element');
                return $this->redirect(['index']);
            }

            $model->save();
            $model->saveImages();
            return $this->redirect(['view', 'id' => $model->id]);
        }
        Yii::$app->session->addFlash('success','success');
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing element model.
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
     * Finds the element model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Element the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Element::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionImageUpload()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $file_image = UploadedFile::getInstancesByName('image');

        $folder_full = Yii::getAlias('@frontend') . '/web/uploads/element/images/';

        if (!file_exists($folder_full)) {
            mkdir($folder_full, 0777, true);
        }

        if ($file_image) {
            $folder = '/element/images/';
            foreach ($file_image as $file) {
                $prod_iMaGes = new ElementImages();

                $ext = pathinfo($file->name, PATHINFO_EXTENSION);
                $name = pathinfo($file->name, PATHINFO_FILENAME);
                $generateName = Yii::$app->security->generateRandomString();
                $path = Yii::getAlias('@frontend') . '/web/uploads' . $folder . $generateName . ".{$ext}";
                $file->saveAs($path);
                $data = [
                    'generate_name' => $generateName,
                    'name' => $name,
                    'path' => Yii::getAlias('@uploadsUrl') . $folder . $generateName . ".{$ext}"
                ];
            }
        }

        return $data;
    }

    public function actionImageDelete()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        if ($this->request->post()) {
            $post = $this->request->post();
            $imgs = ElementImages::find()
                ->where(['name' => $post['key']])
                ->one();
            if ($imgs) {
                $imgs->delete();
            }
        }

    }
}
