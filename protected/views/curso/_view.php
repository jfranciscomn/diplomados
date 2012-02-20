	<tr>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->nombre); ?>
		</td>
	<!---	<td>
			<?php echo CHtml::encode($data->importancia); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->objetivo); ?>
		</td>
	-->
		<td>
			<?php echo CHtml::encode($data->autor); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->duracion); ?>
		</td>
	</tr>