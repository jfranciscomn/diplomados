	<tr>
		<td>
			<?php echo CHtml::link(CHtml::encode($data['id']), array('grupo/view', 'id'=>$data['id'])); ?>
		</td>
		<td>
			<?php echo CHtml::link(CHtml::encode($data['curso']), array('curso/view', 'id'=>$data['curso_id'])); ?>
		</td>
		<td>
			<?php echo CHtml::link(CHtml::encode($data['instructor']), array('instructor/view', 'id'=>$data['instructor_id'])); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data['fecha_inicial']); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data['capacidad_max']); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data['inscritos']); ?>
		</td>
		<td>
			<?php  $model=Grupo::model()->findByPk($data['id']) ; echo $model->estatusAlumno(Yii::app()->user->id); ?>
		</td>
		<?php /*
		<td>
			<?php echo CHtml::encode($data->estatus); ?>
		</td>
		*/ ?>
	</tr>