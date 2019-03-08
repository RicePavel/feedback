<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use app\models\FeedbackForm;
use vova07\imperavi\Widget;

$this->title = 'Добавить отзыв';

?>

<div>
    
    <h3>Добавить отзыв</h3>
    
    <?php $form = ActiveForm::begin(['options' => [
        'enctype' => 'multipart/form-data'
    ]]) ?>
    
        <?= $form->field($model, 'caption')->dropDownList(FeedbackForm::getCaptionsList()) ?>
    
        <?= $form->field($model, 'description')->widget(Widget::className(), [
            'settings' => [
                'lang' => 'ru',
                'minHeight' => 200,
                'plugins' => [
                    'clips',
                    'fullscreen'
                ],
                'clips' => [
                    ['Lorem ipsum...', 'Lorem...'],
                    ['red', '<span class="label-red">red</span>'],
                    ['green', '<span class="label-green">green</span>'],
                    ['blue', '<span class="label-blue">blue</span>'],
                ]
            ]
        ]);
            
            
            ?>
    
        <?= $form->field($model, 'uploadedFile')->fileInput()->label(false) ?>
    
        <button>Сохранить</button>
    
    <?php ActiveForm::end() ?>
    
</div>