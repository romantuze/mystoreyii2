<?php

namespace app\models;

use Yii;
use yii\base\Model;


class SortForm extends Model
{
    public $sort;
    public $number;

    public function rules()
    {
        return [
            [['sort', 'number'], 'trim'],
        ];
    }
}
