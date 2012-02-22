<?php
$this->breadcrumbs=array(
	'Instructors'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Instructors', 'url'=>array('index')),
	array('label'=>'Crear Instructors', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('instructor-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="page-header">
	<h1 style="margin-top:50px;" >Administrar Instructors</h1>
</div>
<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
-->
<div class='row'>
	<div class="span12">
		<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('ext.custom.widgets.CCustomGridView', array(
	'id'=>'instructor-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'rowCssClass'=>array(),
	'itemsCssClass'=>'bordered-table zebra-striped',
	'columns'=>array(
		'id',
		'nombre',
		'app',
		'apm',
		'direccion',
		'telefono',
		/*
		'celular',
		'correo',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
</div>
<div class="span4">
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
