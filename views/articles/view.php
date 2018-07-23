<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\widgets\LinkPager;


$this->title = $article->title;

?>
<div class="site-index">    

    <div class="body-content">

       <article class="post">                  
                    <h1><?=$article->title ?></h1>
                    <p><small><?=$article->date ?></small></p>
                    <p><?=$article->content ?></p>
                    <hr>
                </article>




           <?php /* <  ?php foreach ($articles as $article) :?>
                <?php var_dump($article); ?>
              <article class="post">
                  
                    <h2><a href="<?=Url::toRoute(['articles/view','id'=>$article->id])?>"><?=$article->title ?></a></h2>
                    <p><small><?=$article->date ?></small></p>
                    <p><?=$article->description ?></p>
                    <hr>
                </article>

            <?php endforeach; ?> */?>

    </div>
</div>
