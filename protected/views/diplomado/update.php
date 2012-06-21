<?php
$this->breadcrumbs=array(
	'Diplomados'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Diplomados', 'url'=>array('index')),
	array('label'=>'Crear Diplomados', 'url'=>array('create')),
	array('label'=>'Ver Diplomado', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Diplomados', 'url'=>array('admin')),
);
?>

<div class="page-header">
	<h1 style="margin-top:50px;" >Editar Diplomado <?php echo $model->id; ?></h1>
</div>


<div class='row'>
	<div class='span12'>

		<?php echo $this->renderPartial('_form', array('model'=>$model,
		'cursos'=> (new Curso))); ?>
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