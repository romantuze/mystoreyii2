<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model,'name')->label('Ваше имя') ?>
<?= $form->field($model,'email')->label('Ваш Email') ?>
<?= Html::submitButton('Отправить',['class'=>'btn btn-primary']) ?>
<?php ActiveForm::end(); ?>
