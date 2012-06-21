<table class="bordered-table zebra-striped">
	<tr>
		<td class='span2'>
			<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?></b>
		</td>
		<td >
			<b><?php echo CHtml::encode('Grupo'); ?></b>
		</td>
		<td >
			<b><?php echo CHtml::encode($data->getAttributeLabel('Estatus')); ?></b>
		</td>
		<?php 
			if(!Yii::app()->user->isGuest && strcmp(Yii::app()->user->id,'Admin')!=0)
			{ ?>
		<td >
			<b><?php echo CHtml::encode('Mi Estatus'); ?></b>
		</td>
		<?php 
			} ?>
	</tr>