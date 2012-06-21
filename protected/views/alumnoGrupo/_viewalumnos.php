	<tr>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->id), array('alumnogrupo/view', 'id'=>$data->id)); ?>
		</td>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->persona->nombre), array('persona/view', 'id'=>$data->persona->id)); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->estatus); ?>
		</td>
	</tr>