<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\FeedbackForm;
use app\models\ar\Feedback;
use app\models\ar\Files;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;

class FeedbackController extends Controller {
    
    public function actionAdd() {
        $model = new FeedbackForm();
        $request = \Yii::$app->request;
        if ($request->isPost) {
            $model->load($request->post());
            $model->uploadedFile = \yii\web\UploadedFile::getInstance($model, 'uploadedFile');
            $ok = $model->insert();
            if ($ok) {
                \Yii::$app->session->setFlash('message', 'Обращение успешно сохранено');
                return $this->redirect(['feedback/view', 'feedback_id' => $model->feedback_id]);
            }
        }
        return $this->render('add', ['model' => $model]);
    }
    
    public function actionView($feedback_id) {
        $model = Feedback::getFeedback($feedback_id);
        return $this->render('view', ['model' => $model]);
    }
    
    public function actionGet_file($file_id) {
        $filePath = Files::getFilePath($file_id);
        return \Yii::$app->response->sendFile($filePath);
    }
    
    public function actionAll() {
        $dataProvider = new ActiveDataProvider([
            'query' => Feedback::find(),
            'pagination' => [
                'pageSize' => 3
            ]
        ]);
        return $this->render('all', ['dataProvider' => $dataProvider]);
    }
    
}

