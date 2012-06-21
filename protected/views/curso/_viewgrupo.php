	<tr>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->id), array('grupo/view', 'id'=>$data->id)); ?>
		</td>
		<td>
			<?php
			$fecha=strtotime($data->fecha_inicial); 
			
			echo CHtml::encode($data->curso->nombre. ' ' .date('d/m/Y', $fecha) . ' ('.$data->instructor->nombre.')');
			?>
		</td>
		<td>
			<?php echo CHtml::encode($data->estatus); ?>
		</td>
		
		
			<?php 
				if(!Yii::app()->user->isGuest && strcmp(Yii::app()->user->id,'Admin')!=0)
				{
					echo '<td>';
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
					echo '</td>';
				}
				
			?>
		
	</tr>