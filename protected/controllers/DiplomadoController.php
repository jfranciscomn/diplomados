<?php

class DiplomadoController extends Controller
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
				'actions'=>array('index','view','search'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','registrar','autocompletesearch'),
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
		$model=new Diplomado;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Diplomado']))
		{
			$model->attributes=$_POST['Diplomado'];
			if($model->save())
			{
			
				$strcursos=$_POST['Curso']['id'];
				//echo '<pre>'; print_r($strcursos); echo '</pre>';
			
				$lscurso=explode(',',$strcursos);
				$cursos = new DiplomadoCurso;
				$cursos->diplomado_id=$model->id;
				$cursos->markToDelete();
				foreach($lscurso as $curso_id)
				{
					$cursos = new DiplomadoCurso;
					$cursos->curso_id=$curso_id;
					$cursos->diplomado_id=$model->id;
					$cursos->customUpdate();
				}
				$this->redirect(array('view','id'=>$model->id));

				//echo '<pre> Diplomado'; print_r($model->attributes); echo '</pre>';
			}
			
		}

		$this->render('create',array(
			'model'=>$model,
		));
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

		if(isset($_POST['Diplomado']))
		{
			$model->attributes=$_POST['Diplomado'];
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
		$dataProvider=new CActiveDataProvider('Diplomado');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Diplomado('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Diplomado']))
			$model->attributes=$_GET['Diplomado'];

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
		$model=Diplomado::model()->findByPk($id);
		//echo "<pre>"; print_r($model); echo "</pre>";
		//echo "<pre>"; print_r($model->diplomadosCursoses[0]->curso->attributes); echo "</pre>";
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='diplomado-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionAutocompletesearch()
	{
		$q = "%". $_GET['term'] ."%";
	 	$result = array();
	    if (!empty($q))
	    {
			$criteria=new CDbCriteria;
		//	$criteria->select=array('id', 'nombre');
			$criteria->condition='lower(nombre) LIKE lower(:nombre) ';
			$criteria->params=array(':nombre'=>$q);
			$criteria->limit='10';
			
	        $cursor = Diplomado::model()->findAll($criteria);
			foreach ($cursor as $valor)	
				$result[]=Array('label' => $valor->nombre,  
				                'value' => $valor->nombre,
				                'id' => $valor->id, );
		}
		echo json_encode($result);
	    Yii::app()->end();
	}
	public function actionSearch($q)
	{
	    $term = '%'.trim($q).'%';
	    $result = array();

	    if (!empty($term))
	    {
			$criteria=new CDbCriteria;
		//	$criteria->select=array('id', 'nombre');
			$criteria->condition='nombre LIKE :nombre ';
			$criteria->params=array(':nombre'=>$term);
			$criteria->limit='10';
			
	        $cursor = Diplomado::model()->findAll($criteria);
			foreach ($cursor as $valor)
				$result[]=$valor->attributes;
			//echo "<pre>"; print_r($result); echo "</pre>";
			//echo "<pre>"; print_r($cursor); echo "</pre>";
			//echo "<pre>"; print_r($criteria); echo "</pre>";
	    }

	    //header('Content-type: application/json');
	    //echo json_encode($result);
		echo CJavaScript::encode($result);
	    Yii::app()->end();
	}
	
}
