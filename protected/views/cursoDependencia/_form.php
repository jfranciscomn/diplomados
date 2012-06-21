<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'curso-dependencia-form',
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
		<?php echo $form->labelEx($model,'dependencia_id'); ?>
		<?php echo $form->textField($model,'dependencia_id'); ?>
		<?php echo $form->error($model,'dependencia_id'); ?>

	</div>
	

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'descripcion'); ?>

	</div>
	

	<div class="row">
		<?php echo $form->labelEx($model,'estatus'); ?>
		<?php echo $form->dropDownList($model,'estatus',$model->estatusLabel); ?>
		<?php echo $form->error($model,'estatus'); ?>
	</div>
	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->