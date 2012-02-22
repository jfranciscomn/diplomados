<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'curso_id'); ?>
		<?php echo $form->textField($model,'curso_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'instructor_id'); ?>
		<?php echo $form->textField($model,'instructor_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_inicial'); ?>
		<?php echo $form->textField($model,'fecha_inicial'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'capacidad_max'); ?>
		<?php echo $form->textField($model,'capacidad_max'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'inscritos'); ?>
		<?php echo $form->textField($model,'inscritos'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'observaciones'); ?>
		<?php echo $form->textField($model,'observaciones',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estatus'); ?>
		<?php echo $form->textField($model,'estatus'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->