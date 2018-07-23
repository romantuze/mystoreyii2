<?php

namespace app\controllers;

use app\models\Article;
use yii\web\Controller;

class ArticlesController extends Controller
{

    public function actionIndex()
    {
        $articles     = Article::find()->all();
        return $this->render('index',
            ['articles' => $articles]
        );
    }

    public function actionCategory()
    {
        $articles     = Article::find()->all();
        return $this->render('category',
            ['articles' => $articles]
        );
    }

    public function actionView()
    {

        if (isset($_GET['id']) && $_GET['id'] != '' && filter_var($_GET['id'], FILTER_VALIDATE_INT)) {

            $article = Article::find()->where(['id' => $_GET['id']])->one();
            return $this->render('view',
                ['article' => $article]
            );
        }

        return $this->redirect(['articles/index']);

    }

}
