<?php
  use yii\helpers\Html;
  use yii\helpers\url;
  use yii\bootstrap\ActiveForm;
  use yii\widgets\LinkPage;
  
  $this->title = 'Каталог товаров';
  $this->params['breadcrumbs'][] = $this->title;
  ?>
<div class="row">
  <div class="col-md-3">
    <h3>Фильтр товаров</h3>
    <p>Цена</p>
    <?php $formFilter = ActiveForm::begin([
      'method'=>'post'
        ]); ?>
    <?php echo $formFilter->field($modelFilter, 'priceMin')->label('от'); ?>
    <?php echo $formFilter->field($modelFilter, 'priceMax')->label('до'); ?>
    <?php echo Html::submitButton('Показать'); ?>
    <?php ActiveForm::end(); ?>
  </div>
  <div class="col-md-9">
    <div class="main-page">
      <h1><?= $categories['name']; ?></h1>
      <p><img src="/images/<?= $categories['img']; ?>" width="300" alt=""</p>
      <p><?= $categories['description']; ?></p>
      <div class="product-list">
        <div class="row">
          <div class="col-md-2">
            <p>В наличии: <?=$count_products?></p>
          </div>
          <div class="col-md-6">
            <div class="row">
              <?php $form = ActiveForm::begin(); ?>
              <div class="col-md-5">  
                <?php echo $form->field($modelSort, 'sort')->dropDownList(
                  ['1'=>'Цена по возрастанию',
                  '2'=>'Цена по убыванию',],
                  $params = ['prompt'=>'--']
                  )->label('Сортировать по:'); ?>
              </div>
              <div class="col-md-5">  
                <?php echo $form->field($modelSort, 'number')->dropDownList(['12'=>'12','24'=>'24','48'=>'48'], $params = ['options'=>['12'=>['selected'=>true]]])->label('Показать:'); ?>
              </div>
              <div class="col-md-2">  
                <?php echo Html::submitButton('Go'); ?>
              </div>
              <?php ActiveForm::end(); ?>
            </div>
          </div>
          <div class="col-md-4">
            <?php if ($view=='0') : ?>
            <p>Вид: <span>Сетка</span> <a href="<?=Url::toRoute(['page/listproducts','id'=>$categories['id'],'view'=>'1'])?>">Список</a></p>
            <?php else : ?>
            <p>Вид: <a href="<?=Url::toRoute(['page/listproducts','id'=>$categories['id'],'view'=>'0'])?>">Сетка</a> <span>Список</span></p>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="site-catalog">
        <div class="product-list">
          <div class="row">
            <?php foreach($products as $product) : ?>
            <?php if ($view==1) : ?>
            <div class="col-md-12">
              <div class="product-item">
                <div class="product-border">
                  <div class="product-item-image">
                    <a href="<?=Url::toRoute(['page/product','id'=>$product['id']]);?>"><img src="/images/<?=$product['img']?>" alt=""></a>
                  </div>
                  <div class="product-item-title"><a href="<?=Url::toRoute(['page/product','id'=>$product['id']]);?>"><?=$product['name']?></a></div>
                  <div class="product-item-price"><?=$product['price']?> p
                    <?php if($product['price_old']!='') { echo '-'.(100-intval($product['price']*100/$product['price_old'])).'%'; } ?>
                  </div>
                  <?php if ($product['price_old']!='') : ?>
                  <div class="product-item-price"><small><strike><?=$product['price_old']?></strike></small> p</div>
                  <?php endif; ?>
                  <div class="product-item-buy"><a href="<?=Url::toRoute(['cart/index','id'=>$product['id']]);?>" role="button" class="btn btn-primary">В корзину</a></div>
                </div>
              </div>
            </div>
            <?php else: ?>
            <div class="col-md-4">
              <div class="product-item">
                <div class="product-border">
                  <div class="product-item-image">
                    <a href="<?=Url::toRoute(['page/product','id'=>$product['id']]);?>"><img src="/images/<?=$product['img']?>" alt=""></a>
                  </div>
                  <div class="product-item-title"><a href="<?=Url::toRoute(['page/product','id'=>$product['id']]);?>"><?=$product['name']?></a></div>
                  <div class="product-item-price"><?=$product['price']?> p
                    <?php if($product['price_old']!='') { echo '-'.(100-intval($product['price']*100/$product['price_old'])).'%'; } ?>
                  </div>
                  <?php if ($product['price_old']!='') : ?>
                  <div class="product-item-price"><small><strike><?=$product['price_old']?></strike></small> p</div>
                  <?php endif; ?>
                  <div class="product-item-buy"><a href="<?=Url::toRoute(['cart/index','id'=>$product['id']]);?>" role="button" class="btn btn-primary">В корзину</a></div>
                </div>
              </div>
            </div>
            <?php endif; ?>
            <?php endforeach; ?>


          </div>
        </div>
<?php
//Выводим виджет с пагинацией
echo \yii\widgets\LinkPager::widget([
'pagination' => $pages,
]);
?>



      </div>
    </div>
  </div>
</div>