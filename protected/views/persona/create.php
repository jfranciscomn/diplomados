<?php
$this->breadcrumbs=array(
	'Personas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Personas', 'url'=>array('index')),
	array('label'=>'Administrar Personas', 'url'=>array('admin')),
);
?>

<div class="page-header">
	<?php if(!Yii::app()->user->isGuest){?>
	<h1 style="margin-top:50px;" >Crear Personas</h1>
	<?php } 
	 else{?>
	<h1 style="margin-top:50px;" >Registrar</h1>
	<?php } ?>
</div>


<div class='row'>
	<div class='span12'>
		<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
	<?php if(!Yii::app()->user->isGuest){?>
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
	<?php } ?>
</div>

