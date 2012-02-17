<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php
echo "<?php\n";
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	'Manage',
);\n";
?>

$this->menu=array(
	array('label'=>'Listar <?php echo $label; ?>', 'url'=>array('index')),
	array('label'=>'Crear <?php echo $label; ?>', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('<?php echo $this->class2id($this->modelClass); ?>-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="page-header">
	<h1 style="margin-top:50px;" >Administrar <?php echo $label; ?></h1>
</div>
<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
<div class='row'>
	<div class="span12">
		<?php echo "<?php echo CHtml::link('Buscar','#',array('class'=>'search-button')); ?>"; ?>

<div class="search-form" style="display:none">
<?php echo "<?php \$this->renderPartial('_search',array(
	'model'=>\$model,
)); ?>\n"; ?>
</div><!-- search-form -->

<?php echo "<?php"; ?> $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
<?php
$count=0;
foreach($this->tableSchema->columns as $column)
{
	if(++$count==7)
		echo "\t\t/*\n";
	echo "\t\t'".$column->name."',\n";
}
if($count>=7)
	echo "\t\t*/\n";
?>
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
</div>
<div class="span4">
	<?php echo "<?php\n"; ?>
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
