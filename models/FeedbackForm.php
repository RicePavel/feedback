<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\ar\Feedback;

class FeedbackForm extends Model {
    
    public $caption;
    public $description;
    
    public function rules() {
        return [
            [['caption', 'description'], 'required'],
            [['caption', 'description'], 'safe']
        ];
    }
    
    public static $captions = [
        'Отзыв',
        'Технический вопрос',
        'Разное'
      ];
    
    public function insert() {
        $ar = new Feedback();
        $ar->attributes = $this->getAttributes();
        $ok = $ar->save();
        if (!$ok) {
            $this->addErrors($ar->getErrors());
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

