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
			array('curso_id, instructor_id, fecha_inicial, capacidad_max, inscritos, estatus', 'required'),
			array('curso_id, instructor_id, capacidad_max, inscritos, estatus', 'numerical', 'integerOnly'=>true),
			array('observaciones', 'length', 'max'=>200),
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
			'alumnosGruposes' => array(self::HAS_MANY, 'AlumnosGrupos', 'grupo_id'),
			'curso' => array(self::BELONGS_TO, 'Cursos', 'curso_id'),
			'instructor' => array(self::BELONGS_TO, 'Instructores', 'instructor_id'),
		);
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
			'capacidad_max' => 'Capacidad Max',
			'inscritos' => 'Inscritos',
			'observaciones' => 'Observaciones',
			'estatus' => 'Estatus',
		);
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
		$criteria->compare('capacidad_max',$this->capacidad_max);
		$criteria->compare('inscritos',$this->inscritos);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->compare('estatus',$this->estatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}