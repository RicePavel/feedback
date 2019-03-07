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
    
    <div><?= $model->caption ?></div>
    <br/>
    <div><?= $model->description ?></div>
    <br/>
    <?php if ($model->file) { ?>
    <a href="<?= Url::to(['feedback/get_file', 'file_id' => $model->file->file_id]) ?>">
            <?= $model->file->name ?> (<?= $model->file->file_type ?>, <?= $model->file->file_size_format ?>)
    </a>
    <?php } ?>
    
</div>