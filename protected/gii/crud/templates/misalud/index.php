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
	'$label',
);\n";
?>

$this->menu=array(
	array('label'=>'Crear <?php echo $label; ?>', 'url'=>array('create')),
	array('label'=>'Administrar <?php echo $label; ?>', 'url'=>array('admin')),
);
?>

<div class="page-header">
	<h1 style="margin-top:50px;" ><?php echo $label; ?></h1>
</div>

<div class='row'>
	<div class="span12">

		<?php echo "<?php"; ?> $this->widget('ext.custom.widgets.CCustomListView', array(
			'dataProvider'=>$dataProvider,
			'headersview' =>'_headersview',
			'footersview' => '_footersview',
			'itemView'=>'_view',
		)); ?>
	</div>
	<div class="span4">					
			<?php echo "<?php\n"; ?>
				$this->beginWidget('zii.widgets.CPortlet', array(
					'title'=>'Operaciones',
				));
				$this->widget('ext.custom.widgets.CCustomMenu', array(
					'items'=>$this->menu,
					//'htmlOptions'=>array('class'=>'label'),	
					'modoopcion'=>false,			
				));	
				$this->endWidget();
			?>
	</div>
</div>