<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php
echo "<?php\n";
$nameColumn=$this->guessNameColumn($this->modelObject);
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	\$model->{$nameColumn},
);\n";
?>

$this->menu=array(
	array('label'=>'Listar <?php echo $this->modelClass; ?>', 'url'=>array('index')),
	array('label'=>'Crear <?php echo $this->modelClass; ?>', 'url'=>array('create')),
	array('label'=>'Editar <?php echo $this->modelClass; ?>', 'url'=>array('update', 'id'=>$model-><?php echo $this->modelObject->primaryKey(); ?>)),
	array('label'=>'Eliminar <?php echo $this->modelClass; ?>', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model-><?php echo $this->modelObject->primaryKey(); ?>),'confirm'=>'¿Estas seguro que deseas eliminiar este elemento?')),
	array('label'=>'Admnistrar <?php echo $this->modelClass; ?>', 'url'=>array('admin')),
);
?>

<div class="page-header">
	<h1 style="margin-top:50px;" >Ver <?php echo $this->modelClass." #<?php echo \$model->{$this->modelObject->primaryKey()}; ?>"; ?></h1>
</div>

<div class='row'>
	<div class='span12'>
		<?php echo "<?php"; ?> $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'attributes'=>array(
		<?php
		foreach($this->modelObject->attributeNames() as $name)
			echo "\t\t'".$name."',\n";
		?>
			),
		)); ?>
	</div>
	<div class='span4'>
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

