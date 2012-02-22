<?php
$this->breadcrumbs=array(
	'Instructors',
);

$this->menu=array(
	array('label'=>'Crear Instructors', 'url'=>array('create')),
	array('label'=>'Administrar Instructors', 'url'=>array('admin')),
);
?>

<div class="page-header">
	<h1 style="margin-top:50px;" >Instructors</h1>
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