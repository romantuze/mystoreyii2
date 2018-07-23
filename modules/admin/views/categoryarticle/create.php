<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Categoryarticle */

$this->title = 'Create Categoryarticle';
$this->params['breadcrumbs'][] = ['label' => 'Categoryarticles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoryarticle-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
