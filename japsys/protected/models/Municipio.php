<?php

/**
 * This is the model class for table "Municipio".
 *
 * The followings are the available columns in table 'Municipio':
 * @property integer $id
 * @property string $clave
 * @property string $nombre
 * @property integer $estado_id
 * @property integer $estatus
 *
 * The followings are the available model relations:
 * @property Institucion $institucion
 * @property Estatus $estatus0
 * @property Estado $estado
 */
class Municipio extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Municipio the static model class
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
		return 'Municipio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('clave, nombre, estado_id, estatus', 'required'),
			array('estado_id, estatus', 'numerical', 'integerOnly'=>true),
			array('clave', 'length', 'max'=>45),
			array('nombre', 'length', 'max'=>145),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, clave, nombre, estado_id, estatus', 'safe', 'on'=>'search'),
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
			'institucion' => array(self::HAS_ONE, 'Institucion', 'domicilio_municipio_id'),
			'estatus0' => array(self::BELONGS_TO, 'Estatus', 'estatus'),
			'estado' => array(self::BELONGS_TO, 'Estado', 'estado_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'clave' => 'Clave',
			'nombre' => 'Nombre',
			'estado_id' => 'Estado',
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
		$criteria->compare('clave',$this->clave,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('estado_id',$this->estado_id);
		$criteria->compare('estatus',$this->estatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}