<?php

/**
 * This is the model class for table "Cursos_Dependencias".
 *
 * The followings are the available columns in table 'Cursos_Dependencias':
 * @property integer $id
 * @property integer $curso_id
 * @property integer $dependencia_id
 * @property string $descripcion
 * @property integer $estatus
 *
 * The followings are the available model relations:
 * @property Cursos $curso
 * @property Cursos $dependencia
 */
class CursoDependencia extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return CursoDependencia the static model class
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
		return 'Cursos_Dependencias';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('curso_id, dependencia_id, estatus', 'required'),
			array('curso_id, dependencia_id, estatus', 'numerical', 'integerOnly'=>true),
			array('descripcion', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, curso_id, dependencia_id, descripcion, estatus', 'safe', 'on'=>'search'),
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
			'curso' => array(self::BELONGS_TO, 'Cursos', 'curso_id'),
			'dependencia' => array(self::BELONGS_TO, 'Cursos', 'dependencia_id'),
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
			'dependencia_id' => 'Dependencia',
			'descripcion' => 'Descripcion',
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
		$criteria->compare('dependencia_id',$this->dependencia_id);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('estatus',$this->estatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}