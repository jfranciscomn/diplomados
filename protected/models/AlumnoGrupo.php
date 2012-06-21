<?php

/**
 * This is the model class for table "Alumnos_Grupos".
 *
 * The followings are the available columns in table 'Alumnos_Grupos':
 * @property integer $id
 * @property integer $grupo_id
 * @property integer $persona_id
 * @property string $observaciones
 * @property integer $estatus
 *
 * The followings are the available model relations:
 * @property Personas $persona
 * @property Grupos $grupo
 */
class AlumnoGrupo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return AlumnoGrupo the static model class
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
		return 'Alumnos_Grupos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('grupo_id, persona_id, estatus', 'required'),
			array('grupo_id, persona_id, estatus', 'numerical', 'integerOnly'=>true),
			array('observaciones', 'length', 'max'=>300),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, grupo_id, persona_id, observaciones, estatus', 'safe', 'on'=>'search'),
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
			'persona' => array(self::BELONGS_TO, 'Persona', 'persona_id'),
			'grupo' => array(self::BELONGS_TO, 'Grupo', 'grupo_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'grupo_id' => 'Grupo',
			'persona_id' => 'Alumno',
			'observaciones' => 'Observaciones',
			'estatus' => 'Estatus',
		);
	}
	
	public function getEstatusLabel()
	{
		return array('No Inscrito','Inscrito','Preinscrito','No Aceptado');
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
		$criteria->compare('grupo_id',$this->grupo_id);
		$criteria->compare('persona_id',$this->persona_id);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->compare('estatus',$this->estatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}