<?php

namespace backend\controllers;

use common\models\Gallery;
use common\models\Process;
use common\models\ProcessImages;
use common\models\ProcessSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * ProcessController implements the CRUD actions for Process model.
 */
class ProcessController extends Controller
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
     * Lists all Process models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProcessSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Process model.
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
     * Creates a new Process model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Process();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                $img = UploadedFile::getInstance($model, 'img');
                if ($img) {

                    $folder = Yii::getAlias('@frontend') . '/web/uploads/contact/';
                    if (!file_exists($folder)) {
                        mkdir($folder, 0777, true);
                    }
                    $generateName = Yii::$app->security->generateRandomString();
                    $path = $folder . $generateName . '.' . $img->extension;
                    $img->saveAs($path);
                    $path = '/frontend/web/uploads/contact/' . $generateName . '.' . $img->extension;
                    $model->img = $path;
                }

                $model->save();
                \Yii::$app->session->addFlash('success','success');
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
     * Updates an existing Process model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {

            $img = UploadedFile::getInstance($model, 'img');
            if ($img) {

                $folder = Yii::getAlias('@frontend') . '/web/uploads/process/';
                if (!file_exists($folder)) {
                    mkdir($folder, 0777, true);
                }
                $generateName = Yii::$app->security->generateRandomString();
                $path = $folder . $generateName . '.' . $img->extension;
                $img->saveAs($path);
                $path = '/frontend/web/uploads/process/' . $generateName . '.' . $img->extension;
                $model->img = $path;
            }

            if ($model['oldAttributes']['img'] && !$img) {
                $model->img = $model['oldAttributes']['img'];
            }
            $model->save();
            \Yii::$app->session->addFlash('success','success');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Process model.
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
     * Finds the Process model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Process the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Process::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionImages($id)
    {

        $model = Process::findOne(['id' => (int)$id]);

        if ($this->request->isPost && $model->load($this->request->post())) {

            if ($model->uploaded_images) {

                $model->saveImages($id);
            }
        }
        return $this->render('images', [
            'model' => $model,
        ]);
    }

    public function actionImageUpload()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $file_image = UploadedFile::getInstancesByName('img');

        $folder_full = Yii::getAlias('@frontend') . '/web/uploads/process';

        if (!file_exists($folder_full)) {
            mkdir($folder_full, 0777, true);
        }

        if ($file_image) {
            $folder = '/process/';
            foreach ($file_image as $file) {

                $ext = pathinfo($file->name, PATHINFO_EXTENSION);
                $name = pathinfo($file->name, PATHINFO_FILENAME);
                $generateName = Yii::$app->security->generateRandomString();
                $path = Yii::getAlias('@frontend') . '/web/uploads/' . $folder . $generateName . ".{$ext}";
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
            $imgs = ProcessImages::find()
                ->where(['path' => $post['key']])
                ->one();
            if ($imgs) {
                $imgs->delete();
            }
        }

    }
}
