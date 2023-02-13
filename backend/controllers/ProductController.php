<?php

namespace backend\controllers;

use common\models\Product;
use common\models\ProductImages;
use common\models\ProductSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
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
     * Lists all Product models.
     *
     * @return string
     */
    public function actionIndex()
    {

        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param int $id
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
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Product();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
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
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {

        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {

            if ($model->save()) {
                $model->saveImages();
                Yii::$app->session->addFlash('success', 'Success');
            }

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionImageUpload()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $file_image = UploadedFile::getInstancesByName('image');

        $folder_full = Yii::getAlias('@frontend') . '/web/uploads/product/images/';

        if (!file_exists($folder_full)) {
            mkdir($folder_full, 0777, true);
        }
        if ($file_image) {
            $folder = '/product/images/';
            foreach ($file_image as $file) {
                $prod_iMaGes = new ProductImages();

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
            $imgs = ProductImages::find()
                ->where(['name' => $post['key']])
                ->one();
            if ($imgs) {
                $imgs->delete();
            }
        }

    }
}
