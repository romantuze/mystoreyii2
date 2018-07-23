<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Корзина товаров';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

  <div class="row">


                    <div class="col-md-12">
                        <div class="main-page">

<div class="site-cart">

<?php if ($products_cart!=='') : ?>

<p>Ваша корзина пуста</p>


<?php else : ?>

<table>
<tr>
	<th></th>
	<th>Товар</th>
	<th></th>
	<th></th>
</tr>
<tr>

</tr>


</table>

<?php endif; ?>

</div>  

</div>
  </div>
                    </div>