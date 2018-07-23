<?php

namespace app\controllers;

use app\models\Categories;
use app\models\FilterForm;
use app\models\Products;
use app\models\SortForm;
use Yii;
use yii\data\Pagination;
use yii\web\Controller;

/* Контроллер страниц сайта */
class PageController extends Controller
{

    public function actionListproducts()
    {
        if (isset($_GET['id']) && $_GET['id'] != '' && filter_var($_GET['id'], FILTER_VALIDATE_INT)) {

            $categories = Categories::find()->where(['id' => $_GET['id']])->asArray()->one();

            if (count($categories) > 0) {

                $modelSort = new SortForm();

                if ($modelSort->load(Yii::$app->request->post()) && $modelSort->validate()) {
                    $sort   = $modelSort->sort;
                    $number = $modelSort->number;
                }

                $modelFilter = new FilterForm();

                if ($modelFilter->load(Yii::$app->request->post()) && $modelFilter->validate()) {
                    $price_min = 0;
                    $price_min = intval($modelFilter->priceMin);
                    $price_max = intval($modelFilter->priceMax);
                }

                if (isset($price_min) && isset($price_max) && $price_min >= 0 && $price_max > 0) {

                    $products = Products::find()->where(['category' => $_GET['id']])->andWhere(['>', 'price', $price_min])->andWhere(['<', 'price', $price_max])->asArray()->all();
                } else {
                    $pagesQuery = Products::find()->where(['category' => $_GET['id']])->asArray()->all();
                    $pages      = new Pagination(['totalCount' => count($pagesQuery), 'pageSize' => 1, 'defaultPageSize' => 5]);
                    $products   = Products::find()->where(['category' => $_GET['id']])->offset($pages->offset)->limit($pages->limit)->asArray()->all();
                }

                $count_products = count($products);

                if (isset($_GET['view']) && ($_GET['view'] == '1')) {$view = 1;} else { $view = 0;}

                return $this->render('listproducts', compact('categories', 'products', 'count_products', 'view', 'modelSort', 'sort', 'number', 'modelFilter', 'price_min', 'price_max', 'pages'));

            }
        }

        return $this->redirect(['page/catalog']);
    }

    public function actionCatalog()
    {
        $categories = Categories::find()->asArray()->all();
        return $this->render('catalog', compact('categories'));
    }

    public function actionProduct()
    {
        if (isset($_GET['id']) && $_GET['id'] != '' && filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
            $product = Products::find()->where(['id' => $_GET['id']])->asArray()->one();
            return $this->render('product', compact('product'));
        } else {
            return $this->redirect(['page/catalog']);
        }

    }

    public function actionNews()
    {
        return $this->render('news');
    }

}
