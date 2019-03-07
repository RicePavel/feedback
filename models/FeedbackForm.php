<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\ar\Feedback;
use app\models\ar\Files;
use yii\helpers\FileHelper;

class FeedbackForm extends Model {
    
    public $caption;
    public $description;
    public $uploadedFile;
    public $feedback_id;
    
    public function rules() {
        return [
            [['caption', 'description'], 'required'],
            [['caption', 'description'], 'safe'],
            [['uploadedFile'], 'file', 'maxFiles' => 1, 'extensions' => 'png, jpg, jpeg, gif, pdf']
        ];
    }
    
    public function attributeLabels() {
        return [
            'caption' => 'Заголовок',
            'description' => 'Описание',
            'uploadedFile'  => 'Файл'
        ];
    }
    
    public static $captions = [
        'Отзыв',
        'Технический вопрос',
        'Разное'
      ];
    
    public function insert() {
        $feedback = new Feedback();
        $feedback->attributes = $this->getAttributes();
        $ok = $feedback->save();
        if ($ok) {
            $this->feedback_id = $feedback->feedback_id;
        } else {
            $this->addErrors($feedback->getErrors());
        }
        if ($ok && $this->uploadedFile) {
            $file = new Files();
            $file->feedback_id = $feedback->feedback_id;
            $file->name = $this->uploadedFile->getBaseName() . '.' . $this->uploadedFile->getExtension();
            $file->file_type = $this->uploadedFile->type;
            $file->file_size = $this->uploadedFile->size;
            $ok = $file->save();
            if (!$ok) {
                $this->addErrors($file->getErrors());
            }
            if ($ok) {
                $fileId = $file->file_id;
                $uploadPath = \Yii::getAlias('@app'). DIRECTORY_SEPARATOR . 'web' . DIRECTORY_SEPARATOR . 'uploads';
                if (!file_exists($uploadPath)) {
                    $ok = FileHelper::createDirectory($uploadPath);
                    if (!$ok) {
                        $this->addError('uploadedFile', 'Системная ошибка');
                    }
                }
                if ($ok) {
                    $fileDir = $uploadPath . DIRECTORY_SEPARATOR . $fileId;
                    $ok = FileHelper::createDirectory($fileDir);
                    if (!$ok) {
                        $this->addError('uploadedFile', 'Системная ошибка');
                    }
                    if ($ok) {
                        $fullPath = $fileDir . DIRECTORY_SEPARATOR . $file->name;
                        $ok = $this->uploadedFile->saveAs($fullPath);
                        if (!$ok) {
                            $this->addError('uploadedFile', 'Системная ошибка');
                        }
                    }
                }
            }
        }
        return $ok;
    }
    
    public static function  getCaptionsList() {
        $arr = [];
        foreach (self::$captions as $caption) {
            $arr[$caption] = $caption;
        }
        return $arr;
    }
    
}

