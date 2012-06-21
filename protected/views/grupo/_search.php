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
		<?php echo $form->labelEx($model,'fecha_inicial'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
				    //'name'=>'fecha',
				    'model'=>$model,
				    'attribute'=>'fecha_inicial',
				    //'value' => $model->fecha_inicial,
				    'options'=>array(
					'showAnim'=>'fold',
					'dateFormat'=>'yy-mm-dd 00:00:00',
				    ),
				    'htmlOptions'=>array(
					'style'=>'height:20px;'
					
				    ),
				));
			?>

	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'fecha_final'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
				    //'name'=>'fecha',
				    'model'=>$model,
				    'attribute'=>'fecha_final',
				    //'value' => $model->fecha_inicial,
				    'options'=>array(
					'showAnim'=>'fold',
					'dateFormat'=>'yy-mm-dd 00:00:00',
				    ),
				    'htmlOptions'=>array(
					'style'=>'height:20px;'
					
				    ),
				));
			?>
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