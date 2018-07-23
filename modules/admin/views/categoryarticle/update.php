<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Categoryarticle */

$this->title = 'Update Categoryarticle: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Categoryarticles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="categoryarticle-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
