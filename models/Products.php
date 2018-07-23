<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Products extends ActiveRecord
{
    public static function tableName() 
    {
        return 'products';
    }
}
