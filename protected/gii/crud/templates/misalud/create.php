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
	'Create',
);\n";
?>

$this->menu=array(
	array('label'=>'Listar <?php echo $label; ?>', 'url'=>array('index')),
	array('label'=>'Administrar <?php echo $label; ?>', 'url'=>array('admin')),
);
?>

<div class="page-header">
	<h1 style="margin-top:50px;" >Crear <?php echo $label; ?></h1>
</div>


<div class='row'>
	<div class='span12'>
		<?php echo "<?php echo \$this->renderPartial('_form', array('model'=>\$model)); ?>\n"; ?>
	</div>
	<div class='span4'>
		<?php echo "<?php\n" ?>
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

