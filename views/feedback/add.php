<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use app\models\FeedbackForm;

$this->title = 'Добавить отзыв';

?>

<div>
    
    <h3>Добавить отзыв</h3>
    
    <?php $form = ActiveForm::begin() ?>
    
        <?= $form->field($model, 'caption')->dropDownList(FeedbackForm::getCaptionsList()) ?>
    
        <?= $form->field($model, 'description')->textarea() ?>
    
        <button>Сохранить</button>
    
    <?php ActiveForm::end() ?>
    
</div>