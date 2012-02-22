<?php
$this->breadcrumbs=array(
	'Instructors'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Instructors', 'url'=>array('index')),
	array('label'=>'Crear Instructors', 'url'=>array('create')),
	array('label'=>'Administrar Instructors', 'url'=>array('admin')),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estas seguro que deseas eliminiar este elemento?')),
	
);
?>

<div class="page-header">
	<h1 style="margin-top:50px;" >Ver Instructor #<?php echo $model->id; ?></h1>
</div>

<div class='row'>
	<div class='span12'>
		<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'itemCssClass'=>array(),
			'htmlOptions'=>array('class'=>'bordered-table zebra-striped'),
			'attributes'=>array(
				'id',
		'nombre',
		'app',
		'apm',
		'direccion',
		'telefono',
		'celular',
		'correo',
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



