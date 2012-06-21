<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'diplomado-curso-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
			<?php echo $form->labelEx($model,'curso_id'); ?>
			<?php $this->widget('ext.custom.widgets.EJuiAutoCompleteFkField', array(
			      'model'=>$model, 
			      'attribute'=>'curso_id', 
			      'sourceUrl'=>Yii::app()->createUrl('curso/autocompletesearch'), 
			     'showFKField'=>false,
			      'relName'=>'curso', // the relation name defined above
			      'displayAttr'=>'nombre',  // attribute or pseudo-attribute to display
			      
			      'options'=>array(
			          'minLength'=>1, 
			      ),
			 )); ?>
		
		<?php echo $form->error($model,'curso_id'); ?>

	</div>
	

	<div class="row">
			<?php echo $form->labelEx($model,'diplomado_id'); ?>
			<?php $this->widget('ext.custom.widgets.EJuiAutoCompleteFkField', array(
			      'model'=>$model, 
			      'attribute'=>'diplomado_id', 
			      'sourceUrl'=>Yii::app()->createUrl('diplomado/autocompletesearch'), 
			     'showFKField'=>false,
			      'relName'=>'diplomado', // the relation name defined above
			      'displayAttr'=>'nombre',  // attribute or pseudo-attribute to display
			      
			      'options'=>array(
			          'minLength'=>1, 
			      ),
			 )); ?>
		
		<?php echo $form->error($model,'curso_id'); ?>

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