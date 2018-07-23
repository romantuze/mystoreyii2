<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<div class="article-form">

   <?php $form = ActiveForm::begin(); ?>
   <div class="form-group">

   <?= Html::dropDownList('category',$selectedCategory,$categories,['class'=>'form-control']) ?>
</div>
<div class="form-group">
    <?= Html::submitButton('Submit', ['class'=>'btn btn-succes']) ?>
</div>
   <?php ActiveForm::end(); ?>
</div>
