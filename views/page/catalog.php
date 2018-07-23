<?php
  use yii\helpers\Html;
  use yii\helpers\Url;
  
  $this->title = 'Каталог товаров';
  $this->params['breadcrumbs'][] = $this->title;
  ?>
<h1><?= Html::encode($this->title) ?></h1>
<div class="row">
  <div class="col-md-12">
    <div class="main-page">
      <div class="site-catalog">
        <div class="row">
          <?php foreach($categories as $category) :?>
          <div class="col-md-4 text-center">
            <div class="image"><img src="/images/<?=$category['img']?>" width="225" alt=""></div>
            <a href="<?=Url::toRoute(['page/listproducts','id'=>$category['id']]);?>"><?=$category['name']?></a>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>