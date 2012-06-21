<?php

/**
 * This is the model class for table "Instructores".
 *
 * The followings are the available columns in table 'Instructores':
 * @property integer $id
 * @property string $nombre
 * @property string $app
 * @property string $apm
 * @property string $direccion
 * @property string $telefono
 * @property string $celular
 * @property string $correo
 *
 * The followings are the available model relations:
 * @property Grupos[] $gruposes
 */
class Instructor extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Instructor the static model class
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
		return 'Instructores';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, app, apm, direccion, correo', 'length', 'max'=>100),
			array('telefono, celular', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, app, apm, direccion, telefono, celular, correo', 'safe', 'on'=>'search'),
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
			'gruposes' => array(self::HAS_MANY, 'Grupos', 'instructor_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'app' => 'App',
			'apm' => 'Apm',
			'direccion' => 'Direccion',
			'telefono' => 'Telefono',
			'celular' => 'Celular',
			'correo' => 'Correo',
		);
	}
	
	public function getnombreCompleto()
	{
		return $this->nombre . '  ' . $this->app . ' ' . $this->apm;
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
		$criteria->compare('app',$this->app,true);
		$criteria->compare('apm',$this->apm,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('celular',$this->celular,true);
		$criteria->compare('correo',$this->correo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}