<?php
$this->breadcrumbs=array(
	'Curso Dependencias',
);

$this->menu=array(
	array('label'=>'Crear Curso Dependencias', 'url'=>array('create')),
	array('label'=>'Administrar Curso Dependencias', 'url'=>array('admin')),
);
?>

<div class="page-header">
	<h1 style="margin-top:50px;" >Curso Dependencias</h1>
</div>

<div class='row'>
	<div class="span12">

		<?php $this->widget('ext.custom.widgets.CCustomListView', array(
			'dataProvider'=>$dataProvider,
			'headersview' =>'_headersview',
			'footersview' => '_footersview',
			'itemView'=>'_view',
		)); ?>
	</div>
	<div class="span4">					
			<?php
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