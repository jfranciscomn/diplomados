<?php
$this->breadcrumbs=array(
	'Diplomado Cursos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Diplomado Cursos', 'url'=>array('index')),
	array('label'=>'Crear Diplomado Cursos', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('diplomado-curso-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="page-header">
	<h1 style="margin-top:50px;" >Administrar Diplomado Cursos</h1>
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
	'id'=>'diplomado-curso-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'rowCssClass'=>array(),
	'itemsCssClass'=>'bordered-table zebra-striped',
	'columns'=>array(
		'id',
		'curso_id',
		'diplomado_id',
		'estatus',
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
