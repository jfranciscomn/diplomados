<?php
$this->breadcrumbs=array(
	'Grupos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Grupos', 'url'=>array('index')),
	array('label'=>'Crear Grupos', 'url'=>array('create')),
	array('label'=>'Administrar Grupos', 'url'=>array('admin')),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estas seguro que deseas eliminiar este elemento?')),
	
);
?>

<div class="page-header">
	<h1 style="margin-top:50px;" >Ver Grupo #<?php echo $model->id; ?></h1>
</div>

<div class='row'>
	<div class='span12'>
		<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'itemCssClass'=>array(),
			'htmlOptions'=>array('class'=>'bordered-table zebra-striped'),
			'attributes'=>array(
				'id',
		'curso_id',
		'instructor_id',
		'fecha_inicial',
		'capacidad_max',
		'inscritos',
		'observaciones',
		'estatus',
			),
		)); ?>
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
</div>



