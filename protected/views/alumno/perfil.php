<?php
$this->breadcrumbs=array(
/*	'Alumno'=>array('index'),*/
	$model->getnombreCompleto(),
);
	$this->menu = array(
	array('label'=>'Mi Perfil', 'url'=>array('alumno/perfil')),
	array('label'=>'Mis Diplomados', 'url'=>array('alumno/dimplomados')),
	array('label'=>'Mis Cursos', 'url'=>array('alumno/cursos')),
	array('label'=>'Mis Grupos', 'url'=>array('alumno/grupos')),
	);
?>

<div class="page-header">
	
			<h1 style="margin-top:50px;" >Perfil </h1>

			


</div>

<div class='row'>
	<?php if(!Yii::app()->user->isGuest){?>
	<div class='span12'>
	<?php } ?>
		<div>
		<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'itemCssClass'=>array(),
			'htmlOptions'=>array('class'=>'bordered-table zebra-striped'),
			'attributes'=>array(
				'id',
		'nombre',
		'app',
		'apm',
		'departamento',
		'telefono',
		'celular',
		'correo',
			),
		)); ?>
		</div>
		<div style="text-align:right;margin-bottom:5mm;">
		
		<a class="btn small primary"  href=
		<?php 
		
			echo $this->createUrl('persona/update',array('correo'=>Yii::app()->user->id));
		?>>
		<i class="icon-cog"></i>
		Editar
		</a>
		</div>
		<div>
		<?php $this->widget('ext.custom.widgets.CCustomListView', array(
			'dataProvider'=>new CActiveDataProvider('AlumnoGrupo', array(
			    'criteria'=>array(
			        'condition'=>"persona_id={$model->id}",
			    ),
			    'pagination'=>array(
			        'pageSize'=>10,
			    ),
			)),
			'headersview' =>'_headersperfilcurso',
			'footersview' => '_footersperfilcurso',
			'itemView'=>'_perfilcurso',
		)); ?>
		</div>
		
	<?php if(!Yii::app()->user->isGuest){?>
		
	</div>
	<div class='span4'>
		<?php
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Operaciones',
				));
					//me quedé tratando de adivinar cual es el menú derecho del controlador CMenu
			$this->widget('ext.custom.widgets.CCustomMenu', array(
				'items'=>$this->menu,
					//'htmlOptions'=>array('class'=>'label'),	
				'modoopcion'=>false,			
				));	
			$this->endWidget();
		?>
	</div>
	<?php } ?>
	
</div>



