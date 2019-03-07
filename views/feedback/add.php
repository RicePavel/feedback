<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use app\models\FeedbackForm;

$this->title = 'Добавить отзыв';

?>

<div>
    
    <h3>Добавить отзыв</h3>
    
    <?php $form = ActiveForm::begin(['options' => [
        'enctype' => 'multipart/form-data'
    ]]) ?>
    
        <?= $form->field($model, 'caption')->dropDownList(FeedbackForm::getCaptionsList()) ?>
    
        <?= $form->field($model, 'description')->textarea() ?>
    
        <?= $form->field($model, 'uploadedFile')->fileInput()->label(false) ?>
    
        <button>Сохранить</button>
    
    <?php ActiveForm::end() ?>
    
</div>