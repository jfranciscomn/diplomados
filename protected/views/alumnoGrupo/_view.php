	<tr>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
		</td>
		<td>
			<?php  $fecha=strtotime($data->grupo->fecha_inicial);
			echo CHtml::link(CHtml::encode($data->grupo->curso->nombre. ' ' .date('d/m/Y', $fecha) . ' ('.$data->grupo->instructor->nombre.')'  ), array('grupo/view', 'id'=>$data->grupo_id)); ?>
		</td>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->persona->nombre . ' ' . $data->persona->app .' ' . $data->persona->apm), array('persona/view', 'id'=>$data->persona_id)); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->observaciones); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->estatusLabel[$data->estatus]); ?>
		</td>
	</tr>