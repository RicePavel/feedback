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

class FeedbackController extends Controller {
    
    public function actionAdd() {
        $model = new FeedbackForm();
        $request = \Yii::$app->request;
        if ($request->isPost) {
            $model->load($request->post());
            $model->insert();
        }
        return $this->render('add', ['model' => $model]);
    }
    
    public function actionView() {
        
    }
    
    public function actionSearch() {
        
    }
    
}

