<?php

namespace app\models\ar;

use yii\db\ActiveRecord;
use yii\db\Query;

class Files extends ActiveRecord {
    
    public static function tableName() {
        return '{{files}}';
    }
    
    public function getFeedback() {
        return $this->hasOne(Feedback::className(), ['feedback_id' => 'feedback_id']);
    }
    
    public function getFile_size_format() {
        $filesize = $this->file_size;
        $formats = array('Б','КБ','МБ','ГБ','ТБ');// варианты размера файла
	$format = 0;// формат размера по-умолчанию
	// прогоняем цикл
	while ($filesize > 1024 && count($formats) != ++$format)
	{
		$filesize = round($filesize / 1024, 2);
	}
	// если число большое, мы выходим из цикла с
	// форматом превышающим максимальное значение
	// поэтому нужно добавить последний возможный
	// размер файла в массив еще раз
	$formats[] = 'ТБ';
        $filesize = round($filesize);
	return $filesize.$formats[$format];
    }
    
    public static function getFilePath($file_id) {
        $filePath = "";
        $file = Files::findOne($file_id);
        if ($file) {
            $filePath = \Yii::getAlias('@app'). DIRECTORY_SEPARATOR . 'web' . DIRECTORY_SEPARATOR . 'uploads' . 
                    DIRECTORY_SEPARATOR . $file_id . DIRECTORY_SEPARATOR . $file->name;
        }
        return $filePath;
    }
    
}
