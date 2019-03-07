<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use app\models\FeedbackForm;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;

$this->title = 'Отзывы';

?>

<div>
    <?php 
        echo ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_list'
        ]);    
    ?>
</div>