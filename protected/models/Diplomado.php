<?php

/**
 * This is the model class for table "Diplomados".
 *
 * The followings are the available columns in table 'Diplomados':
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 * @property integer $creditos
 * @property integer $activo
 *
 * The followings are the available model relations:
 * @property DiplomadosCursos[] $diplomadosCursoses
 */
class Diplomado extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Diplomado the static model class
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
		return 'Diplomados';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, creditos, activo', 'required'),
			array('creditos, activo', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>256),
			array('descripcion', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, descripcion, creditos, activo', 'safe', 'on'=>'search'),
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
			'diplomadosCursos' => array(self::HAS_MANY, 'DiplomadoCurso', 'diplomado_id'),
			
		);
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
		return $this->estatusLabel[$this->activo];
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'descripcion' => 'Descripcion',
			'creditos' => 'Creditos',
			'activo' => 'Activo',
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
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('creditos',$this->creditos);
		$criteria->compare('activo',$this->activo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}