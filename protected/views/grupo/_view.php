	<tr>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->curso_id); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->instructor_id); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->fecha_inicial); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->capacidad_max); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->inscritos); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->observaciones); ?>
		</td>
		<?php /*
		<td>
			<?php echo CHtml::encode($data->estatus); ?>
		</td>
		*/ ?>
	</tr>