<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'grupo-form',
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
		<?php echo $form->labelEx($model,'instructor_id'); ?>
		<?php $this->widget('ext.custom.widgets.EJuiAutoCompleteFkField', array(
		      'model'=>$model, 
		      'attribute'=>'instructor_id', 
		      'sourceUrl'=>Yii::app()->createUrl('instructor/autocompletesearch'), 
		     'showFKField'=>false,
		      'relName'=>'instructor', // the relation name defined above
		      'displayAttr'=>'nombre',  // attribute or pseudo-attribute to display
		      
		      'options'=>array(
		          'minLength'=>1, 
		      ),
		 )); ?>
		<?php echo $form->error($model,'instructor_id'); ?>

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
		
		<?php echo $form->error($model,'fecha_inicial'); ?>

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
		
		<?php echo $form->error($model,'fecha_final'); ?>

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
		<?php echo $form->dropDownList($model,'estatus',$model->estatusLabel); ?>
		<?php echo $form->error($model,'estatus'); ?>
	</div>
	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->