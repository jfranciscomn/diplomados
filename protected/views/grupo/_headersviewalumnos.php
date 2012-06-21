<table class="bordered-table zebra-striped">
	<tr>
		<td class='span2'>
			<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?></b>
		</td>
		<td >
			<b><?php echo CHtml::encode($data->getAttributeLabel('Alumno')); ?></b>
		</td>
		<td >
			<b><?php echo CHtml::encode($data->getAttributeLabel('Estatus')); ?></b>
		</td>
		<?php if(strcmp(Yii::app()->user->id,'Admin')==0){?>
		<td>
			<b> Operaciones </b>
		</td>
		<?php }?>
	</tr>