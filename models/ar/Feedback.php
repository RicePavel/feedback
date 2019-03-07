<?php

namespace app\models\ar;

use yii\db\ActiveRecord;
use yii\db\Query;

class Feedback extends ActiveRecord {
    
    public static function tableName() {
        return '{{feedbacks}}';
    }
    
    public function rules() {
        return [
            [['caption', 'description'], 'required'],
            [['caption', 'description'], 'safe']
        ];
    }
    
}

