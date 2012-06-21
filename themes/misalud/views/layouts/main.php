<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/estilo.css"  />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css"  />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/menudropdown.css"  />
<!-- 	blueprint CSS framework -->
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	
</head>

<body>
	
	<div class="container">
		<div class="menuDropdown" style="position:fixed;width:940px" >
			<ul>
				<li><a href=<?php echo $this->createUrl('site/index'); ?> id ="current"><b>GES</b></a></li>
				<li><a href=<?php echo $this->createUrl('diplomado/index'); ?>>Diplomados</a>
					<?php if(strcmp(Yii::app()->user->id,'Admin')==0) { ?>
					<ul>
						<li><a href="#">Cursos por Diplomado</a></li>
				   </ul>
					<?php } ?>
			  	</li>
				<li><a href=<?php echo $this->createUrl('curso/index'); ?>>Cursos</a>
			  	</li>
				<li><a href=<?php echo $this->createUrl('grupo/index'); ?>>Grupos</a>
					<?php if(strcmp(Yii::app()->user->id,'Admin')==0) { ?>
					<ul>
						<li><a href=<?php echo $this->createUrl('alumnoGrupo/index'); ?>>Alumnos por Grupo</a></li>
				   </ul>
					<?php } ?>
			  	</li>
				<?php if(strcmp(Yii::app()->user->id,'Admin')==0) { ?>
			 	<li> <a href ='#'>Administraci&oacute;n</a>
					<ul>
						<li><a href=<?php echo $this->createUrl('persona/index'); ?>>Alumnos</a></li>
						<li><a href=<?php echo $this->createUrl('instructor/index'); ?>>Instructores</a></li>
				   </ul>
				</li>
				<?php } ?>
				<div style="float: right;">
				<?php if(Yii::app()->user->isGuest) { ?>
					<li > <a href =<?php echo $this->createUrl('site/login'); ?> > Entrar </a></li>
				<?php } else {?>
					<li> <a href =<?php echo $this->createUrl('site/logout'); ?> > <?php echo 'Logout ('.Yii::app()->user->name.')'; ?> </a></li>
				<?php } ?>
				</div>
			</ul>
		</div>
	<div class="hero-unit">
		
	    <h1>Universidad San Sebasti&aacute;n</h1>
	    <p><strong>Universidad San Sebasti&aacute;n</strong> ofrece m&eacute;todos educativos de vanguardia y desarrolla las habilidades profesionales, personales y humanas necesarias para tener una ventaja competitiva en el mercado laboral.</p>
	<p><a class="btn success" href="http://uss.mx">Saber m&aacute;s &raquo;</a>
	
		

	</div>
	
	
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div style="margin-top:50px;" id="footer">
 		&copy; <?php echo date('Y'); ?> Universidad San Sebastian.<br/>
		Todos los derechos reselvados.<br/>
		Realizado por Sistemas <a href="http://uss.mx">USS</a>.
	</div><!-- footer -->

</div><!-- page -->

<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/script/js/bootstrap.js"></script>
</body>
</html>