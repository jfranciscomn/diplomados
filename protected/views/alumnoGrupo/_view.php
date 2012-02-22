	<tr>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->grupo_id); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->persona_id); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->observaciones); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->estatus); ?>
		</td>
	</tr>