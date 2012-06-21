<?php
$this->breadcrumbs=array(
	'Personas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

if(strcmp(Yii::app()->user->id,'Admin')!=0)
	$this->menu = array(
	array('label'=>'Mi Perfil', 'url'=>array('alumno/perfil')),
	array('label'=>'Mis Diplomados', 'url'=>array('alumno/dimplomados')),
	array('label'=>'Mis Cursos', 'url'=>array('alumno/cursos')),
	array('label'=>'Mis Grupos', 'url'=>array('alumno/grupos')),
	);
else
	$this->menu=array(
	array('label'=>'Listar Personas', 'url'=>array('index')),
	array('label'=>'Crear Personas', 'url'=>array('create')),
	array('label'=>'Ver Persona', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Personas', 'url'=>array('admin')),
);
?>

<div class="page-header">
	<?php if(strcmp(Yii::app()->user->id,'Admin')!=0){ ?>
		<h1 style="margin-top:50px;" >Editar Perfil </h1>
	<?php } else {?>
		<h1 style="margin-top:50px;" >Editar Persona <?php echo $model->id; ?></h1>
	<?php }?>
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