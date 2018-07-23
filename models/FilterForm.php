<?php

namespace app\models;

use Yii;
use yii\base\Model;


class FilterForm extends Model
{
    public $priceMin;
    public $priceMax;

    public function rules()
    {
        return [
            [['priceMin', 'priceMax'], 'trim'],
        ];
    }
}
