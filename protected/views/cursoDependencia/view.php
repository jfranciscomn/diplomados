<?php
$this->breadcrumbs=array(
	'Curso Dependencias'=>array('index'),
	$model->id,
);
if(strcmp(Yii::app()->user->id,'Admin')==0)
$this->menu = array(
array('label'=>'Perfil', 'url'=>array('alumno/perfil')),
array('label'=>'Mis Diplomados', 'url'=>array('alumno/dimplomados')),
array('label'=>'Mis Cursos', 'url'=>array('alumno/cursos')),
array('label'=>'Mis Grupos', 'url'=>array('alumno/grupos')),
);
else
$this->menu=array(
	array('label'=>'Listar Curso Dependencias', 'url'=>array('index')),
	array('label'=>'Crear Curso Dependencias', 'url'=>array('create')),
	array('label'=>'Administrar Curso Dependencias', 'url'=>array('admin')),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estas seguro que deseas eliminiar este elemento?')),
	
);
?>

<div class="page-header">
	<h1 style="margin-top:50px;" >Ver CursoDependencia #<?php echo $model->id; ?></h1>
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
		'curso_id',
		'dependencia_id',
		'descripcion',
		'estatus',
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



