<?php
$this->breadcrumbs=array(
	'Diplomado Cursos'=>array('index'),
	$model->id,
);
if(strcmp(Yii::app()->user->id,'Admin')!=0)
	$this->menu = array(
	array('label'=>'Mi Perfil', 'url'=>array('alumno/perfil')),
	array('label'=>'Mis Diplomados', 'url'=>array('alumno/dimplomados')),
	array('label'=>'Mis Cursos', 'url'=>array('alumno/cursos')),
	array('label'=>'Mis Grupos', 'url'=>array('alumno/grupos')),
	);
else
$this->menu=array(
	array('label'=>'Listar Diplomado Cursos', 'url'=>array('index')),
	array('label'=>'Crear Diplomado Cursos', 'url'=>array('create')),
	array('label'=>'Administrar Diplomado Cursos', 'url'=>array('admin')),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estas seguro que deseas eliminiar este elemento?')),
	
);
?>

<div class="page-header">
	<h1 style="margin-top:50px;" >Ver DiplomadoCurso #<?php echo $model->id; ?></h1>
</div>

<div class='row'>
	<?php if(!Yii::app()->user->isGuest){?>
	<div class='span12'>
	<?php }?>
		<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'itemCssClass'=>array(),
			'htmlOptions'=>array('class'=>'bordered-table zebra-striped'),
			'attributes'=>array(
				'id',
		'curso.nombre:text:Curso',
		'diplomado.nombre:text:Diplomado',
		'estatusString:text:Estatus',
			),
		)); ?>
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
	<?php }?>
</div>



