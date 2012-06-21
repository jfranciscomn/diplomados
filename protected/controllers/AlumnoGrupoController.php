<?php

class AlumnoGrupoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new AlumnoGrupo;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		

		if(isset($_POST['AlumnoGrupo']))
		{
			$model->attributes=$_POST['AlumnoGrupo'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
		
		if(isset($_GET['correo']) && isset($_GET['grupo']))
		{
			//echo '<pre>'; print_r($_GET); echo '</pre>';
			
			$criteria=new CDbCriteria;
			$criteria->condition='correo like :correo';
			$criteria->params=array(':correo'=>$_GET['correo']);
			$persona=Persona::model()->find($criteria);
			if($persona===null)
				throw new CHttpException(401,'Usuario no Autorizado.');
				
			$model->persona_id = $persona->id;
			$model->grupo_id =$_GET['grupo'];
			$model->estatus = 2;
			
			$grupo = Grupo::model()->findByPk($_GET['grupo']);
			if($grupo->capacidad_max<= $grupo->inscritos)
				throw new CHttpException(428,'Cupo Excedido.');
				
			if(isset($grupo) && $this->validateModel($model) && $model->save())
			{
				$grupo->inscritos= $grupo->inscritos + 1;
				$grupo->save();	
			}
			else
				throw new CHttpException(400,'Error al procesar la solicitud.');
			
			$this->redirect(array('grupo/index'));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	
	public function validateModel($model)
	{
		$criteria=new CDbCriteria;

		$criteria->compare('grupo_id',$model->grupo_id);
		$criteria->compare('persona_id',$model->persona_id);
		
		$nuevo = AlumnoGrupo::model()->find($criteria);
		return !isset($nuevo);
		
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AlumnoGrupo']) || isset($_GET['AlumnoGrupo']))
		{
			$model->attributes=isset($_POST['AlumnoGrupo'])? $_POST['AlumnoGrupo'] : $_GET['AlumnoGrupo'];
			
			if(isset($_GET['estatus']))
			{
				$model->estatus=$_GET['estatus'];
				if($model->estatus==3)
				{
					$grupo = Grupo::model()->findByPk($model->grupo_id);
					$grupo->inscritos= $grupo->inscritos - 1;
					$grupo->save();
				}
			}	
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
	
		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('AlumnoGrupo');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new AlumnoGrupo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['AlumnoGrupo']))
			$model->attributes=$_GET['AlumnoGrupo'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=AlumnoGrupo::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='alumno-grupo-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
