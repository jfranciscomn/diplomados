<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php
echo "<?php\n";
$nameColumn=$this->guessNameColumn($this->tableSchema->columns);
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	\$model->{$nameColumn}=>array('view','id'=>\$model->{$this->tableSchema->primaryKey}),
	'Update',
);\n";
?>

$this->menu=array(
	array('label'=>'Listar <?php echo $label; ?>', 'url'=>array('index')),
	array('label'=>'Crear <?php echo $label; ?>', 'url'=>array('create')),
	array('label'=>'Ver <?php echo $this->modelClass; ?>', 'url'=>array('view', 'id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>)),
	array('label'=>'Administrar <?php echo $label; ?>', 'url'=>array('admin')),
);
?>

<div class="page-header">
	<h1 style="margin-top:50px;" >Editar <?php echo $this->modelClass." <?php echo \$model->{$this->tableSchema->primaryKey}; ?>"; ?></h1>
</div>


<div class='row'>
	<div class='span12'>

		<?php echo "<?php echo \$this->renderPartial('_form', array('model'=>\$model)); ?>\n"; ?>
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