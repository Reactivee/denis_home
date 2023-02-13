<?php

namespace backend\controllers;

use common\models\AdvantagesIcons;
use common\models\AdvantagesIconsSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * AdvantagesIconsController implements the CRUD actions for AdvantagesIcons model.
 */
class AdvantagesIconsController extends Controller
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
     * Lists all AdvantagesIcons models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AdvantagesIconsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AdvantagesIcons model.
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
     * Creates a new AdvantagesIcons model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new AdvantagesIcons();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $img = $model->img = UploadedFile::getInstance($model, 'img');
                if ($img) {
                    $folder = Yii::getAlias('@frontend') . '/web/uploads/icons/';
                    if (!file_exists($folder)) {
                        mkdir($folder, 0777, true);
                    }
                    $generateName = Yii::$app->security->generateRandomString();
                    $path = $folder . $generateName . '.' . $img->extension;
                    $img->saveAs($path);
                    $path = '/frontend/web/uploads/icons/' . $generateName . '.' . $img->extension;
                    $model->img = $path;
                }
                if ($model['oldAttributes']['img'] && !$img) {
                    $model->img = $model['oldAttributes']['img'];
                }
                $model->save();
                Yii::$app->session->addFlash('error', "Success");
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
     * Updates an existing AdvantagesIcons model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {
            $img = $model->img = UploadedFile::getInstance($model, 'img');
            if ($img) {
                $folder = Yii::getAlias('@frontend') . '/web/uploads/icons/';
                if (!file_exists($folder)) {
                    mkdir($folder, 0777, true);
                }
                $generateName = Yii::$app->security->generateRandomString();
                $path = $folder . $generateName . '.' . $img->extension;
                $img->saveAs($path);
                $path = '/frontend/web/uploads/icons/' . $generateName . '.' . $img->extension;
                $model->img = $path;
            }
            if ($model['oldAttributes']['img'] && !$img) {
                $model->img = $model['oldAttributes']['img'];
            }
            $model->save();
            Yii::$app->session->addFlash('error', "Success");
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AdvantagesIcons model.
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
     * Finds the AdvantagesIcons model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return AdvantagesIcons the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AdvantagesIcons::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
