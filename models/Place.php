<?php

namespace app\models;

use yii\db\ActiveRecord;

class Place extends ActiveRecord 
{
  
  public static function tableName() {
    return '{{places}}';
  }

  public function rules() {
    return [[['address', 'lat', 'lng'], 'required']];
  }
}