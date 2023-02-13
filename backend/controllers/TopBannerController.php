<?php

namespace backend\controllers;

use common\models\TopBanner;
use common\models\TopBannerSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * TopBannerController implements the CRUD actions for TopBanner model.
 */
class TopBannerController extends Controller
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
     * Lists all TopBanner models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TopBannerSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TopBanner model.
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
     * Creates a new TopBanner model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TopBanner();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $img = $model->img_path = UploadedFile::getInstance($model, 'img_path');
                if ($img) {
                    $folder = Yii::getAlias('@frontend') . '/web/uploads/banners/';
                    if (!file_exists($folder)) {
                        mkdir($folder, 0777, true);
                    }
                    $generateName = Yii::$app->security->generateRandomString();
                    $path = $folder . $generateName . '.' . $img->extension;
                    $img->saveAs($path);
                    $path = '/frontend/web/uploads/banners/' . $generateName . '.' . $img->extension;
                    $model->img_path = $path;
                }

                if ($model['oldAttributes']['img_path'] && !$img) {
                    $model->img_path = $model['oldAttributes']['img_path'];
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
     * Updates an existing TopBanner model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {
            $img = $model->img_path = UploadedFile::getInstance($model, 'img_path');
            if ($img) {
                $folder = Yii::getAlias('@frontend') . '/web/uploads/banners/';
                if (!file_exists($folder)) {
                    mkdir($folder, 0777, true);
                }
                $generateName = Yii::$app->security->generateRandomString();
                $path = $folder . $generateName . '.' . $img->extension;
                $img->saveAs($path);
                $path = '/frontend/web/uploads/banners/' . $generateName . '.' . $img->extension;
                $model->img_path = $path;
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
     * Deletes an existing TopBanner model.
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
     * Finds the TopBanner model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return TopBanner the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TopBanner::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
