<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/estilo.css"  />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css"  />
	<!-- blueprint CSS framework -->
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container">
	<div class="topbar">
		<div class="topbar-inner">
			<div class="container" class"nav">
				<h3>
					<a href="#">GES</a>
				</h3>
				<?php $this->widget('zii.widgets.CMenu',array(
					'items'=>array(
						array('label'=>'Inicio', 'url'=>array('/site/index')),
						array('label'=>'Personas', 'url'=>array('/persona/index')),
						array('label'=>'Acerca de', 'url'=>array('/site/page', 'view'=>'about')),
						array('label'=>'Contacto', 'url'=>array('/site/contact')),
						array('label'=>'Entrar', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
						array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
					),
				)); ?>
				<form class="pull-left" action="">
					<input type="text" placeholder="Search">
				</form>
				
			</div>
		</div>
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

</body>
</html>