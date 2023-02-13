<?php

namespace backend\controllers;

use common\models\Gallery;
use common\models\GallerySearch;
use common\models\ProductImages;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * GalleryController implements the CRUD actions for Gallery model.
 */
class GalleryController extends Controller
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
     * Updates an existing Gallery model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionIndex()
    {
        $model = new Gallery();

        if ($this->request->isPost && $model->load($this->request->post())) {
            if ($model->uploaded_images) {
                $model->saveImages();
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    /**
     * Finds the Gallery model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id
     * @return Gallery the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Gallery::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionImageUpload()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $file_image = UploadedFile::getInstancesByName('img');

        $folder_full = Yii::getAlias('@frontend') . '/web/uploads/gallery';

        if (!file_exists($folder_full)) {
            mkdir($folder_full, 0777, true);
        }

        if ($file_image) {
            $folder = '/gallery/';
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
            $imgs = Gallery::find()
                ->where(['img' => $post['key']])
                ->one();
            if ($imgs) {
                $imgs->delete();
            }
        }

    }
}
