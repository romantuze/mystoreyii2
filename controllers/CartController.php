<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Categories;
use app\models\Products;

class CartController extends Controller
{

    public function actionIndex()
    {

        if (isset($_GET['id']) && $_GET['id']!='' && filter_var($_GET['id'],FILTER_VALIDATE_INT)) {
          $product = Products::find()->where(['id'=>$_GET['id']])->asArray()->one();
        }


        $products_cart = null;

        return $this->render('cart',compact('product','products_cart'));
    }

	
}
