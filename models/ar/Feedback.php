<?php

namespace app\models\ar;

use yii\db\ActiveRecord;
use yii\db\Query;

class Feedback extends ActiveRecord {
    
    public static function tableName() {
        return '{{feedbacks}}';
    }
    
    public function getFile() {
        return $this->hasOne(Files::className(), ['feedback_id' => 'feedback_id']);
    }
    
    public function rules() {
        return [
            [['caption', 'description'], 'required'],
            [['caption', 'description'], 'safe']
        ];
    }
    
    public static function getFeedback($feedback_id) {
        return Feedback::find()->where(['feedback_id' => $feedback_id])->with('file')->one();
    }
    
}

