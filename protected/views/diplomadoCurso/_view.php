	<tr>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->curso_id); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->diplomado_id); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->estatus); ?>
		</td>
	</tr>