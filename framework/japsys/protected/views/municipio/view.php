<?php
$this->pageCaption='Ver Municipio #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Municipio'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Municipio', 'url'=>array('index')),
	array('label'=>'Crear Municipio', 'url'=>array('create')),
	array('label'=>'Actualizar Municipio', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Municipio', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estas seguro que quieres eliminar este elemento?')),
	array('label'=>'Administrar Municipio', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'baseScriptUrl'=>false,
	'cssFile'=>false,
	'htmlOptions'=>array('class'=>'table table-bordered table-striped'),
	'attributes'=>array(
		'id',
		'clave',
		'nombre',
		array(	'name'=>'estado_did',
		        'value'=>'$data->estado->nombre',),
		array(	'name'=>'estatus_did',
		        'value'=>'$data->estatus->nombre',),
	),
)); ?>
