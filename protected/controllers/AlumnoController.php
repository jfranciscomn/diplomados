<?php

class AlumnoController extends Controller
{
	public function accessRules()
	{
		return array(
			
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('cursos','index','perfil','grupos','dimplomados'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionDimplomados()
	{
		$sql="SELECT DISTINCT d.id, d.nombre, d.descripcion, d.creditos, d.activo FROM Diplomados d
		INNER JOIN Diplomados_Cursos dc ON dc.diplomado_id = d.id
		INNER JOIN Grupos g ON g.curso_id = dc.curso_id
		INNER JOIN Alumnos_Grupos ag ON ag.grupo_id=g.id
		INNER JOIN Personas p ON p.id=ag.persona_id
		WHERE p.correo LIKE '".Yii::app()->user->id."'";

		$count=Yii::app()->db->createCommand("SELECT COUNT(DISTINCT d.id, d.nombre, d.descripcion, d.creditos, d.activo) FROM Diplomados d
		INNER JOIN Diplomados_Cursos dc ON dc.diplomado_id = d.id
		INNER JOIN Grupos g ON g.curso_id = dc.curso_id
		INNER JOIN Alumnos_Grupos ag ON ag.grupo_id=g.id
		INNER JOIN Personas p ON p.id=ag.persona_id
		WHERE p.correo LIKE '".Yii::app()->user->id."'")->queryScalar();

		$dataProvider = new CSqlDataProvider($sql, array(
		   'totalItemCount'=>$count,
		    'pagination'=>array(
		        'pageSize'=>20,
		    ),
		));

		$this->render('misDiplomados',array('dataProvider'=>$dataProvider,));
	}
	
	public function actionGrupos()
	{
		$sql="SELECT g.id, g.curso_id, g.instructor_id, g.fecha_inicial, 
		g.capacidad_max, g.inscritos, g.observaciones, g.estatus, 
		i.nombre instructor, c.nombre curso FROM Grupos g
		INNER JOIN Cursos c on g.curso_id = c.id
		INNER JOIN Instructores i on g.instructor_id = i.id
		INNER JOIN Alumnos_Grupos ag on g.id = ag.grupo_id
		INNER JOIN Personas p on p.id=ag.persona_id
		WHERE p.correo LIKE '".Yii::app()->user->id."'";

		$count=Yii::app()->db->createCommand("SELECT COUNT(*) FROM Grupos g
		INNER JOIN Cursos c on g.curso_id = c.id
		INNER JOIN Instructores i on g.instructor_id = i.id
		INNER JOIN Alumnos_Grupos ag on g.id = ag.grupo_id
		INNER JOIN Personas p on p.id=ag.persona_id
		WHERE p.correo LIKE '".Yii::app()->user->id."'")->queryScalar();

		$dataProvider = new CSqlDataProvider($sql, array(
		   'totalItemCount'=>$count,
		    'pagination'=>array(
		        'pageSize'=>20,
		    ),
		));

		$this->render('misGrupos',array('dataProvider'=>$dataProvider,));
	}
	public function actionCursos()
	{
	
		$sql="SELECT c.* FROM Cursos c
		  INNER JOIN Grupos g ON c.id = g.curso_id
		  INNER JOIN Alumnos_Grupos ag ON ag.grupo_id= g.id
		  INNER JOIN Personas p ON ag.persona_id = p.id
		  WHERE p.correo like '".Yii::app()->user->id."'";

		$count=Yii::app()->db->createCommand("SELECT Count(*) FROM Cursos c
		  INNER JOIN Grupos g ON c.id = g.curso_id
		  INNER JOIN Alumnos_Grupos ag ON ag.grupo_id= g.id
		  INNER JOIN Personas p ON ag.persona_id = p.id
		  WHERE p.correo like '".Yii::app()->user->id."'")->queryScalar();

		$dataProvider = new CSqlDataProvider($sql, array(
		   'totalItemCount'=>$count,
		    'pagination'=>array(
		        'pageSize'=>20,
		    ),
		));

		$this->render('misCursos',array('dataProvider'=>$dataProvider,));
	}
	
	public function actionPerfil()
	{	//	echo '<pre>'; print_r(Yii::app()->user->id); echo '</pre>';
			$this->render('perfil',array(
				'model'=>$this->loadModel(Yii::app()->user->id),
			));
	}
	
	public function loadModel($id)
	{
		$criteria=new CDbCriteria;
		$criteria->condition='correo like :correo';
		$criteria->params=array(':correo'=>$id);
		$model=Persona::model()->find($criteria);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}