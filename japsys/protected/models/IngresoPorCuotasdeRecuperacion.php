<?php

/**
 * This is the model class for table "IngresoPorCuotasdeRecuperacion".
 *
 * The followings are the available columns in table 'IngresoPorCuotasdeRecuperacion':
 * @property integer $id
 * @property double $consultas
 * @property double $despensas
 * @property double $otro
 * @property integer $institucion_id
 * @property integer $ejercicio_id
 * @property integer $estatus_id
 * @property integer $editable
 * @property string $ultimaModificacion
 *
 * The followings are the available model relations:
 * @property Institucion $institucion
 * @property Estatus $estatus
 * @property EjercicioFiscal $ejercicio
 */
class IngresoPorCuotasdeRecuperacion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return IngresoPorCuotasdeRecuperacion the static model class
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
		return 'IngresoPorCuotasdeRecuperacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('consultas, despensas, otro, institucion_id, ejercicio_id, estatus_id, editable, ultimaModificacion', 'required'),
			array('institucion_id, ejercicio_id, estatus_id, editable', 'numerical', 'integerOnly'=>true),
			array('consultas, despensas, otro', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, consultas, despensas, otro, institucion_id, ejercicio_id, estatus_id, editable, ultimaModificacion', 'safe', 'on'=>'search'),
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
			'institucion' => array(self::BELONGS_TO, 'Institucion', 'institucion_id'),
			'estatus' => array(self::BELONGS_TO, 'Estatus', 'estatus_id'),
			'ejercicio' => array(self::BELONGS_TO, 'EjercicioFiscal', 'ejercicio_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'consultas' => 'Consultas',
			'despensas' => 'Despensas',
			'otro' => 'Otro',
			'institucion_id' => 'Institucion',
			'ejercicio_id' => 'Ejercicio',
			'estatus_id' => 'Estatus',
			'editable' => 'Editable',
			'ultimaModificacion' => 'Ultima Modificacion',
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
		$criteria->compare('consultas',$this->consultas);
		$criteria->compare('despensas',$this->despensas);
		$criteria->compare('otro',$this->otro);
		$criteria->compare('institucion_id',$this->institucion_id);
		$criteria->compare('ejercicio_id',$this->ejercicio_id);
		$criteria->compare('estatus_id',$this->estatus_id);
		$criteria->compare('editable',$this->editable);
		$criteria->compare('ultimaModificacion',$this->ultimaModificacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}