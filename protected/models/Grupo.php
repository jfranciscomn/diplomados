<?php

/**
 * This is the model class for table "Grupos".
 *
 * The followings are the available columns in table 'Grupos':
 * @property integer $id
 * @property integer $curso_id
 * @property integer $instructor_id
 * @property string $fecha_inicial
 * @property integer $capacidad_max
 * @property integer $inscritos
 * @property string $observaciones
 * @property integer $estatus
 *
 * The followings are the available model relations:
 * @property AlumnosGrupos[] $alumnosGruposes
 * @property Cursos $curso
 * @property Instructores $instructor
 */
class Grupo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Grupo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Grupos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('curso_id, instructor_id, fecha_inicial,fecha_final, capacidad_max, inscritos, estatus', 'required'),
			array('curso_id, instructor_id, capacidad_max, inscritos, estatus', 'numerical', 'integerOnly'=>true),
			array('observaciones', 'length', 'max'=>200),
			array('fecha_inicial, fecha_final', 'type', 'type' => 'date', 'message' => '{attribute}: no es una fecha', 'dateFormat'=>'yyyy-MM-dd HH:mm:ss'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, curso_id, instructor_id, fecha_inicial, capacidad_max, inscritos, observaciones, estatus', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'alumnosGrupos' => array(self::HAS_MANY, 'AlumnoGrupo', 'grupo_id'),
			'curso' => array(self::BELONGS_TO, 'Curso', 'curso_id'),
			'instructor' => array(self::BELONGS_TO, 'Instructor', 'instructor_id'),
		);
	}
	
	public  function estatusAlumno($alumno)
	{
		//$grupo = Grupo::model()->findByPk($id);
	//	echo '<pre>'; print_r($this->alumnosGrupos); echo '</pre>';
		foreach($this->alumnosGrupos as $alumnos)
			if(strcmp($alumnos->persona->correo,$alumno)==0)
				return $alumnos->estatusString ;
		return null;
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'curso_id' => 'Curso',
			'instructor_id' => 'Instructor',
			'fecha_inicial' => 'Fecha Inicial',
			'fecha_final' => 'Fecha Final',
			'capacidad_max' => 'Capacidad Max',
			'inscritos' => 'Inscritos',
			'observaciones' => 'Observaciones',
			'estatus' => 'Estatus',
		);
	}
	
	public function getnombre()
	{
		$fecha=strtotime($this->fecha_inicial);
		return $this->curso->nombre. ' ' .date('d/m/Y', $fecha) . ' ('.$this->instructor->nombre.')'  ;
		
	}
	public function getEstatusLabel()
	{
		return array(
			0=>'No Activo',
			1=>'Activo', 
		);
	}
	public function GetEstatusString()
	{
		return $this->estatusLabel[$this->estatus];
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('curso_id',$this->curso_id);
		$criteria->compare('instructor_id',$this->instructor_id);
		$criteria->compare('fecha_inicial',$this->fecha_inicial,true);
		$criteria->compare('fecha_final',$this->fecha_inicial,true);
		$criteria->compare('capacidad_max',$this->capacidad_max);
		$criteria->compare('inscritos',$this->inscritos);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->compare('estatus',$this->estatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
/*	protected function beforeSave()
	{	    
	    if(parent::beforeSave())
	    {
			// Format dates based on the locale
			foreach($this->metadata->tableSchema->columns as $columnName => $column)
			{
			    if ($column->dbType == 'date' )
			    {
			        $this->$columnName = date('Y-m-d',
			            CDateTimeParser::parse($this->$columnName,
			            'd/M/yyyy'));
			    }
			    elseif ($column->dbType == 'datetime')
			    {
			        $this->$columnName = date('Y-m-d',
			            CDateTimeParser::parse($this->$columnName,
			            'd/M/yyyy'));
			    }
			}
			
		
			return true;
	    }
	    else
			return false;
	}
	
	protected function afterFind()
	{
	    // Format dates based on the locale
	    foreach($this->metadata->tableSchema->columns as $columnName => $column)
	    {           
		 	if (!strlen($this->$columnName)) continue;
	 
			if ($column->dbType == 'date'  )
			{ 
			    $this->$columnName = Yii::app()->dateFormatter->formatDateTime(
			            CDateTimeParser::parse(
			                $this->$columnName, 
			                'yyyy-MM-dd'
			            ),
			            'medium',null
			        );
			}
			elseif ($column->dbType == 'datetime')
			{
			    $this->$columnName = Yii::app()->dateFormatter->formatDateTime(
			            CDateTimeParser::parse(
			                $this->$columnName, 
			                'yyyy-MM-dd hh:mm:ss'
			            ),
			            'medium',null
			        );
			}
	    }
	    return true;
	}*/
}