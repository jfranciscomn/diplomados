<?php
$this->breadcrumbs=array(
	'Curso Dependencias'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Curso Dependencias', 'url'=>array('index')),
	array('label'=>'Crear Curso Dependencias', 'url'=>array('create')),
	array('label'=>'Ver CursoDependencia', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Curso Dependencias', 'url'=>array('admin')),
);
?>

<div class="page-header">
	<h1 style="margin-top:50px;" >Editar CursoDependencia <?php echo $model->id; ?></h1>
</div>


<div class='row'>
	<div class='span12'>

		<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
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