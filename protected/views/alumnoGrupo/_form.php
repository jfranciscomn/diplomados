<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'alumno-grupo-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'grupo_id'); ?>
		<?php echo $form->textField($model,'grupo_id'); ?>
		<?php echo $form->error($model,'grupo_id'); ?>

	</div>
	

	<div class="row">
		<?php echo $form->labelEx($model,'persona_id'); ?>
		<?php $this->widget('ext.custom.widgets.EJuiAutoCompleteFkField', array(
		      'model'=>$model, 
		      'attribute'=>'persona_id', 
		      'sourceUrl'=>Yii::app()->createUrl('persona/autocompletesearch'), 
		     'showFKField'=>false,
		      'relName'=>'persona', // the relation name defined above
		      'displayAttr'=>'nombre',  // attribute or pseudo-attribute to display
		      
		      'options'=>array(
		          'minLength'=>1, 
		      ),
		 )); ?>
		<?php echo $form->error($model,'persona_id'); ?>

	</div>
	

	<div class="row">
		<?php echo $form->labelEx($model,'observaciones'); ?>
		<?php echo $form->textField($model,'observaciones',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'observaciones'); ?>

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