<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'diplomado-curso-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'curso_id'); ?>
		<?php echo $form->textField($model,'curso_id'); ?>
		<?php echo $form->error($model,'curso_id'); ?>

	</div>
	

	<div class="row">
		<?php echo $form->labelEx($model,'diplomado_id'); ?>
		<?php echo $form->textField($model,'diplomado_id'); ?>
		<?php echo $form->error($model,'diplomado_id'); ?>

	</div>
	

	<div class="row">
		<?php echo $form->labelEx($model,'estatus'); ?>
		<?php echo $form->textField($model,'estatus'); ?>
		<?php echo $form->error($model,'estatus'); ?>

	</div>
	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->