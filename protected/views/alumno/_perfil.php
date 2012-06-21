	<tr>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->nombre); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->app); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->apm); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->departamento); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->telefono); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->celular); ?>
		</td>
		<?php /*
		<td>
			<?php echo CHtml::encode($data->correo); ?>
		</td>
		*/ ?>
	</tr>