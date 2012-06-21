<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'instructor-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nombre'); ?>

	</div>
	

	<div class="row">
		<?php echo $form->labelEx($model,'app'); ?>
		<?php echo $form->textField($model,'app',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'app'); ?>

	</div>
	

	<div class="row">
		<?php echo $form->labelEx($model,'apm'); ?>
		<?php echo $form->textField($model,'apm',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'apm'); ?>

	</div>
	

	<div class="row">
		<?php echo $form->labelEx($model,'direccion'); ?>
		<?php echo $form->textField($model,'direccion',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'direccion'); ?>

	</div>
	

	<div class="row">
		<?php echo $form->labelEx($model,'telefono'); ?>
		<?php echo $form->textField($model,'telefono',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'telefono'); ?>

	</div>
	

	<div class="row">
		<?php echo $form->labelEx($model,'celular'); ?>
		<?php echo $form->textField($model,'celular',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'celular'); ?>

	</div>
	

	<div class="row">
		<?php echo $form->labelEx($model,'correo'); ?>
		<?php echo $form->textField($model,'correo',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'correo'); ?>

	</div>
	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->