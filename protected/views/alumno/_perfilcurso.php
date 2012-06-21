	<tr>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->id), array('alumnogrupo/view', 'id'=>$data->id)); ?>
		</td>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->grupo->curso->nombre), array('curso/view', 'id'=>$data->grupo->curso->id)); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->grupo->curso->creditos); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->estatus); ?>
		</td>
		
	</tr>