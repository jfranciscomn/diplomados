	<tr>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->curso->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->diplomado->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->estatusString); ?>
		</td>
	</tr>