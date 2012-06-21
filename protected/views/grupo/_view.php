	<tr>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
		</td>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->curso->nombre), array('curso/view', 'id'=>$data->curso->id)); ?>
		</td>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->instructor->nombre), array('instructor/view', 'id'=>$data->instructor->id)); ?>
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
			<?php 
				if(Yii::app()->user->isGuest || strcmp(Yii::app()->user->id,'Admin')==0)
					echo CHtml::encode($data->observaciones); 
				else
				{
					if($data->estatusAlumno(Yii::app()->user->id)!=null)
					{
						echo $data->estatusAlumno(Yii::app()->user->id);
					}
					else if($data->capacidad_max<=$data->inscritos)
					{
						echo 'Lleno';
					}
					else
					{
						echo '<a  href=';echo $this->createUrl('alumnogrupo/create',array('correo'=>Yii::app()->user->id,'grupo'=>$data->id));
						echo '>Inscribirme</a>';
					}
				}
				
			?>
		</td>

		
		<?php /*
		<td>
			<?php echo CHtml::encode($data->estatus); ?>
		</td>
		*/ ?>
	</tr>