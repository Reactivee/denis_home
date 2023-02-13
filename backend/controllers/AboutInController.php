<?php

namespace backend\controllers;

use common\models\AboutIn;
use common\models\AboutInSearch;
use common\models\AboutSet;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * AboutInController implements the CRUD actions for AboutIn model.
 */
class AboutInController extends Controller
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
     * Lists all AboutIn models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AboutInSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AboutIn model.
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
     * Creates a new AboutIn model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new AboutIn();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {


                $model->save();
                Yii::$app->session->addFlash('success','success');
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
     * Updates an existing AboutIn model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {



            $model->save();
            Yii::$app->session->addFlash('success','success');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AboutIn model.
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

    public function actionAboutSettings()
    {

        $searchModel = new AboutInSearch();
        $dataProvider = $searchModel->searchSet($this->request->queryParams);

        return $this->render('index_settings', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the AboutIn model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return AboutIn the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AboutIn::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionCreateSet()
    {
        $model = new AboutSet();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                $img = UploadedFile::getInstance($model, 'img');

                $img_2 = UploadedFile::getInstance($model, 'img_2');

                if ($img) {

                    $folder = Yii::getAlias('@frontend') . '/web/uploads/about_in/';
                    if (!file_exists($folder)) {
                        mkdir($folder, 0777, true);
                    }
                    $generateName = Yii::$app->security->generateRandomString();
                    $path = $folder . $generateName . '.' . $img->extension;
                    $img->saveAs($path);
                    $path = '/frontend/web/uploads/about_in/' . $generateName . '.' . $img->extension;
                    $model->img = $path;
                }

                if ($model['oldAttributes']['img'] && !$img) {
                    $model->img = $model['oldAttributes']['img'];
                }

                if ($img_2) {

                    $folder_ = Yii::getAlias('@frontend') . '/web/uploads/about_in/';
                    if (!file_exists($folder_)) {
                        mkdir($folder_, 0777, true);
                    }
                    $generateName_ = Yii::$app->security->generateRandomString();
                    $path_ = $folder_ . $generateName_ . '.' . $img_2->extension;
                    $img_2->saveAs($path_);
                    $path_ = '/frontend/web/uploads/about_in/' . $generateName_ . '.' . $img_2->extension;
                    $model->img_2 = $path_;
                }

                if ($model['oldAttributes']['img_2'] && !$img_2) {
                    $model->img_2 = $model['oldAttributes']['img_2'];
                }

                $model->save();
                Yii::$app->session->addFlash('success','success');
                return $this->redirect(['about-settings',]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('_form_set', [
            'model' => $model,
        ]);
    }

    public function actionUpdateSet($id)
    {
        $model = AboutSet::findOne($id);

        if ($this->request->isPost && $model->load($this->request->post())) {

            $img = UploadedFile::getInstance($model, 'img');
            $img_2 = UploadedFile::getInstance($model, 'img_2');
            $back = UploadedFile::getInstance($model, 'background');

            if ($img) {

                $folder = Yii::getAlias('@frontend') . '/web/uploads/about_in/';
                if (!file_exists($folder)) {
                    mkdir($folder, 0777, true);
                }
                $generateName = Yii::$app->security->generateRandomString();
                $path = $folder . $generateName . '.' . $img->extension;
                $img->saveAs($path);
                $path = '/frontend/web/uploads/about_in/' . $generateName . '.' . $img->extension;
                $model->img = $path;
            }

            if ($model['oldAttributes']['img'] && !$img) {
                $model->img = $model['oldAttributes']['img'];
            }

            if ($back) {

                $folder_ = Yii::getAlias('@frontend') . '/web/uploads/about_in/';
                if (!file_exists($folder_)) {
                    mkdir($folder_, 0777, true);
                }
                $generateName_ = Yii::$app->security->generateRandomString();
                $path_ = $folder_ . $generateName_ . '.' . $back->extension;
                $back->saveAs($path_);
                $path_ = '/frontend/web/uploads/about_in/' . $generateName_ . '.' . $img_2->extension;
                $model->background = $path_;
            }

            if ($model['oldAttributes']['background'] && !$back) {
                $model->background = $model['oldAttributes']['background'];
            }

            if ($img_2) {

                $folder_ = Yii::getAlias('@frontend') . '/web/uploads/about_in/';
                if (!file_exists($folder_)) {
                    mkdir($folder_, 0777, true);
                }
                $generateName_ = Yii::$app->security->generateRandomString();
                $path_ = $folder_ . $generateName_ . '.' . $img_2->extension;
                $img_2->saveAs($path_);
                $path_ = '/frontend/web/uploads/about_in/' . $generateName_ . '.' . $img_2->extension;
                $model->img_2 = $path_;
            }

            if ($model['oldAttributes']['img_2'] && !$img_2) {
                $model->img_2 = $model['oldAttributes']['img_2'];
            }

            $model->save();
            Yii::$app->session->addFlash('success','success');
            return $this->redirect(['about-settings']);
        }

        return $this->render('_form_set', [
            'model' => $model,
        ]);
    }

}
