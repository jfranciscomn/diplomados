<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'grupo-form',
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
		<?php echo $form->labelEx($model,'instructor_id'); ?>
		<?php echo $form->textField($model,'instructor_id'); ?>
		<?php echo $form->error($model,'instructor_id'); ?>

	</div>
	

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_inicial'); ?>
		<?php echo $form->textField($model,'fecha_inicial'); ?>
		<?php echo $form->error($model,'fecha_inicial'); ?>

	</div>
	

	<div class="row">
		<?php echo $form->labelEx($model,'capacidad_max'); ?>
		<?php echo $form->textField($model,'capacidad_max'); ?>
		<?php echo $form->error($model,'capacidad_max'); ?>

	</div>
	

	<div class="row">
		<?php echo $form->labelEx($model,'inscritos'); ?>
		<?php echo $form->textField($model,'inscritos'); ?>
		<?php echo $form->error($model,'inscritos'); ?>

	</div>
	

	<div class="row">
		<?php echo $form->labelEx($model,'observaciones'); ?>
		<?php echo $form->textField($model,'observaciones',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'observaciones'); ?>

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