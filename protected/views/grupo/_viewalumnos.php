	<tr>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->id), array('alumnogrupo/view', 'id'=>$data->id)); ?>
		</td>
		<td>
			<?php echo CHtml::link(CHtml::encode($data->persona->nombre . ' '.$data->persona->app . ' '.$data->persona->apm), array('persona/view', 'id'=>$data->persona->id)); ?>
		</td>
		<td>
			<?php echo CHtml::encode($data->estatusLabel[$data->estatus]); ?>
		</td>
		
		<?php if(strcmp(Yii::app()->user->id,'Admin')==0) { ?>
		
		<td>
				<?php
				
				if($data->estatus==2)
				{
					echo "<a href='";
						echo $this->createUrl('alumnogrupo/update',array('id'=>$data->id,'estatus'=>1,'AlumnoGrupo'=>$data->attributes));
					echo "'>Aceptar</a><br>";
				}
				if($data->estatus==2 || $data->estatus==1)
				{
					echo "<a href='";
						echo $this->createUrl('alumnogrupo/update',array('id'=>$data->id,'estatus'=>3,'AlumnoGrupo'=>$data->attributes));
					echo "'>Denegar</a>";
				}
				?>
				
		</td>
		<?php }?>
	</tr>