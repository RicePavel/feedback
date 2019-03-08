<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use app\models\FeedbackForm;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;


$this->title = 'Отзыв';

?>

<div>
    
    <?php if (\Yii::$app->session->hasFlash('message')) { ?>
    <div class="alert alert-success" role="alert"><?= \Yii::$app->session->getFlash('message') ?></div>
    <?php } ?>
    
    <div><?= Html::encode($model->caption) ?></div>
    <br/>
    <div><?= HtmlPurifier::process($model->description) ?></div>
    <br/>
    <?php if ($model->file) { ?>
    <a href="<?= Url::to(['feedback/get_file', 'file_id' => $model->file->file_id]) ?>">
            <?= $model->file->name ?> 
        <?php if ($model->file->file_size) { ?>
            (<?= $model->file->file_type ?>, <?= $model->file->file_size_format ?>)
        <?php } ?>
    </a>
    <?php } ?>
    
</div>