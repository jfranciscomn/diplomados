	<tr>
		<td>
			<?php echo CHtml::link(CHtml::encode($data['id']), array('diplomado/view', 'id'=>$data['id'])); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data['nombre']); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data['descripcion']); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data['creditos']); ?>
		</td>
		
	</tr>