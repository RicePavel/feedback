<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use app\models\FeedbackForm;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;


$this->title = 'Отзыв';

?>

<div class="feedbackItem">
    <div><?= Html::encode($model->caption) ?></div>
    <div><?= Html::encode($model->description) ?></div>
    <?php if ($model->file) { ?>
        <a href="<?= Url::to(['feedback/get_file', 'file_id' => $model->file->file_id]) ?>">
                <?= $model->file->name ?> 
            <?php if ($model->file->file_size) { ?>
                (<?= $model->file->file_type ?>, <?= $model->file->file_size_format ?>)
            <?php } ?>
        </a>
    <?php } ?>
</div>