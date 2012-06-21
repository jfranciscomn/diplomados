	<tr>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->id), array('diplomadocurso/view', 'id'=>$data->id)); ?>
		</td>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->curso->nombre), array('curso/view', 'id'=>$data->curso->id)); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->curso->creditos); ?>
		</td>
	</tr>