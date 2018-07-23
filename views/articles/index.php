<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\widgets\LinkPager;


$this->title = 'Статьи - Интернет магазин снаряжения';

?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Статьи!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        
    </div>

    <div class="body-content">

       




            <?php foreach ($articles as $article) :?>
                 <?php /* <?php var_dump($article); ?> */?>
              <article class="post">
                    <?php /* <a href="<?=Url::toRoute(['articles/view','id'=>$article->id])?>"><img src="" alt=""></a> */ ?>
                    <h2><a href="<?=Url::toRoute(['articles/view','id'=>$article->id])?>"><?=$article->title ?></a></h2>
                    <p><small><?=$article->date ?></small></p>
                    <p><?=$article->description ?></p>
                    <hr>
                </article>

            <?php endforeach; ?>



    

    </div>
</div>
