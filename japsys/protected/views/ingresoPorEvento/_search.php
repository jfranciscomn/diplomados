<div class="wide form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="clearfix">
		<?php echo $form->label($model,'id'); ?>
		<div class="input">
			<?php echo $form->textField($model,'id'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'colectas'); ?>
		<div class="input">
			<?php echo $form->textField($model,'colectas'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'eventos'); ?>
		<div class="input">
			<?php echo $form->textField($model,'eventos'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'rifas'); ?>
		<div class="input">
			<?php echo $form->textField($model,'rifas'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'desayunos'); ?>
		<div class="input">
			<?php echo $form->textField($model,'desayunos'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'conferencias'); ?>
		<div class="input">
			<?php echo $form->textField($model,'conferencias'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'institucion_id'); ?>
		<div class="input">
			<?php echo $form->textField($model,'institucion_id'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'ejercicio_id'); ?>
		<div class="input">
			<?php echo $form->textField($model,'ejercicio_id'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'estatus_id'); ?>
		<div class="input">
			<?php echo $form->textField($model,'estatus_id'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'editable'); ?>
		<div class="input">
			<?php echo $form->textField($model,'editable'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'ultimaModificacion'); ?>
		<div class="input">
			<?php echo $form->textField($model,'ultimaModificacion'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->