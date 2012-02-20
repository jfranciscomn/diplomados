<table class="bordered-table zebra-striped">
	<tr>
		<td class='span2'>
			<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?></b>
		</td>
		<td >
			<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?></b>
		</td>
		<!--<td >
			<b><?php echo CHtml::encode($data->getAttributeLabel('importancia')); ?></b>
		</td>
		<td >
			<b><?php echo CHtml::encode($data->getAttributeLabel('objetivo')); ?></b>
		</td>
		-->
		<td >
			<b><?php echo CHtml::encode($data->getAttributeLabel('autor')); ?></b>
		</td>
		<td >
			<b><?php echo CHtml::encode($data->getAttributeLabel('duracion')); ?></b>
		</td>
	</tr>