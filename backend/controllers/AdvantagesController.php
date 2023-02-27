<?php

namespace backend\controllers;

use common\models\Advantages;
use common\models\AdvantagesSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * AdvantagesController implements the CRUD actions for Advantages model.
 */
class AdvantagesController extends Controller
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
     * Lists all Advantages models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AdvantagesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Advantages model.
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
     * Creates a new Advantages model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Advantages();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                $img = $model->img = UploadedFile::getInstance($model, 'img');
                if ($img) {
                    $folder = Yii::getAlias('@frontend') . '/web/uploads/advantages/';
                    if (!file_exists($folder)) {
                        mkdir($folder, 0777, true);
                    }
                    $generateName = Yii::$app->security->generateRandomString();
                    $path = $folder . $generateName . '.' . $img->extension;
                    $img->saveAs($path);
                    $path = '/frontend/web/uploads/advantages/' . $generateName . '.' . $img->extension;
                    $model->img = $path;
                }

                if ($model['oldAttributes']['img'] && !$img) {
                    $model->img = $model['oldAttributes']['img'];
                }
                $model->save();
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
     * Updates an existing Advantages model.
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
            //var_dump($img);die();
            if ($img) {
                $folder = Yii::getAlias('@frontend') . '/web/uploads/advantages/';
                if (!file_exists($folder)) {
                    mkdir($folder, 0777, true);
                }
                $generateName = Yii::$app->security->generateRandomString();
                $path = $folder . $generateName . '.' . $img->extension;
                $img->saveAs($path);
                $path = '/frontend/web/uploads/advantages/' . $generateName . '.' . $img->extension;
                $model->img = $path;
            }

            if ($model['oldAttributes']['img'] && !$img) {
                $model->img = $model['oldAttributes']['img'];
            }

            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Advantages model.
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
     * Finds the Advantages model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Advantages the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Advantages::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
