<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'diplomado-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'nombre'); ?>

	</div>
	

<!--	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textArea($model,'descripcion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'descripcion'); ?>

	</div>
-->

	<div class="row">
		<?php echo $form->labelEx($model,'creditos'); ?>
		<?php echo $form->textField($model,'creditos'); ?>
		<?php echo $form->error($model,'creditos'); ?>

	</div>
	

	<div class="row">
		<?php echo $form->labelEx($model,'activo'); ?>
		<?php echo $form->textField($model,'activo'); ?>
		<?php echo $form->error($model,'activo'); ?>

	</div>

	<div class="row">
	    <?php echo $form->labelEx($model,'Descripcion'); ?>
	    <?php $this->widget('ext.tokeninput.TokenInput', array(
	        'model' => $model,
	        'attribute' => 'descripcion',
	        'url' => array('curso/search'),
	        'options' => array(
	            'allowCreation' => true,
	            //'preventDuplicates' => true,
	            'resultsFormatter' => 'js:function(item){return "<li>" + item[nombre]+ "</li>" }',
				
	            'theme' => 'facebook',
	        )
	    )); ?>
	    <?php echo $form->error($model,'Descripcion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->