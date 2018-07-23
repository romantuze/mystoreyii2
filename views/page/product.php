<?php
  use yii\helpers\Html;
  use yii\helpers\Url;
  
  $this->title = 'Товар';
  $this->params['breadcrumbs'][] = $this->title;
  ?>
<h1><?= Html::encode($this->title) ?></h1>
<div class="row">
  <div class="col-md-12">
    <div class="main-page">
      <div class="site-product">
        <div class="product-item">
          <div class="product-border">
            <div class="product-item-image">
              <img src="/images/<?=$product['img']?>" alt="">
            </div>
            <div class="product-item-title"><?=$product['name']?></div>
            <div class="product-item-price"><?=$product['price']?> p
              <?php if($product['price_old']!='') { echo '-'.(100-intval($product['price']*100/$product['price_old'])).'%'; } ?>
            </div>
            <?php if ($product['price_old']!='') : ?>
            <div class="product-item-price"><small><strike><?=$product['price_old']?></strike></small> p</div>
            <?php endif; ?>
            <div class="product-item-description">
              <?=$product['description']?>
            </div>
            <div class="product-item-buy"><a href="<?=Url::toRoute(['/cart/index','id'=>$product['id']]);?>" role="button" class="btn btn-primary">В корзину</a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>