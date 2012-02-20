<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'curso-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'nombre'); ?>

	</div>
	

	<div class="row">
		<?php echo $form->labelEx($model,'importancia'); ?>
		<?php echo $form->textArea($model,'importancia',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'importancia'); ?>

	</div>
	

	<div class="row">
		<?php echo $form->labelEx($model,'objetivo'); ?>
		<?php echo $form->textArea($model,'objetivo',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'objetivo'); ?>

	</div>
	

	<div class="row">
		<?php echo $form->labelEx($model,'autor'); ?>
		<?php echo $form->textField($model,'autor',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'autor'); ?>

	</div>
	

	<div class="row">
		<?php echo $form->labelEx($model,'duracion'); ?>
		<?php echo $form->textField($model,'duracion'); ?>
		<?php echo $form->error($model,'duracion'); ?>

	</div>
	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->