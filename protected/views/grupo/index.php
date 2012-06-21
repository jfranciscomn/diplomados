<?php
$this->breadcrumbs=array(
	'Grupos',
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
	array('label'=>'Crear Grupos', 'url'=>array('create')),
	array('label'=>'Administrar Grupos', 'url'=>array('admin')),
);
?>

<div class="page-header">
	<h1 style="margin-top:50px;" >Grupos</h1>
</div>

<div class='row' >
	<?php if(!Yii::app()->user->isGuest){?>
	<div class="span12" >
	<?php } ?>
		
		<?php $this->widget('ext.custom.widgets.CCustomListView', array(
			'dataProvider'=>$dataProvider,
			'headersview' =>'_headersview',
			'footersview' => '_footersview',
			'itemView'=>'_view',
		)); ?>
	<?php if(!Yii::app()->user->isGuest){?>
	</div>
	
	<div class="span4">					
			<?php
				$this->beginWidget('zii.widgets.CPortlet', array(
					'title'=>"operaciones",
				));
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