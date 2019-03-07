<?php

namespace app\models\ar;

use yii\db\ActiveRecord;
use yii\db\Query;

class Files extends ActiveRecord {
    
    public static function tableName() {
        return '{{files}}';
    }
    
}
