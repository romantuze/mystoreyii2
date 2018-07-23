<div class="article-form">
	<?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model,'image')->fileInput(['maxlength'=>true]); ?>
	<div class="form-group">
		<?php Html::submitButtin('Create',['class'=>'btn btn-success']) ?>
	</div>

</div>