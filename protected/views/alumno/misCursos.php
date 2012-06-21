<?php
$this->breadcrumbs=array(
	'Mis Cursos',
);
	$this->menu = array(
	array('label'=>'Mi Perfil', 'url'=>array('alumno/perfil')),
	array('label'=>'Mis Diplomados', 'url'=>array('alumno/dimplomados')),
	array('label'=>'Mis Cursos', 'url'=>array('alumno/cursos')),
	array('label'=>'Mis Grupos', 'url'=>array('alumno/grupos')),
	);
?>

<div class="page-header">
	<h1 style="margin-top:50px;" >Cursos</h1>
</div>

<div class='row'>

	<div class="span12">


		<?php $this->widget('ext.custom.widgets.CCustomListView', array(
			'dataProvider'=>$dataProvider,
			'headersview' =>'_headerscursoview',
			'footersview' => '_footerscursoview',
			'itemView'=>'_cursoview',
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

