<?php

/**
 * This is the model class for table "Cursos".
 *
 * The followings are the available columns in table 'Cursos':
 * @property integer $id
 * @property string $nombre
 * @property string $importancia
 * @property string $objetivo
 * @property string $autor
 * @property integer $duracion
 * @property integer $creditos
 */
class Curso extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Curso the static model class
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
		return 'Cursos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, autor, creditos', 'required'),
			array('duracion, creditos', 'numerical', 'integerOnly'=>true),
			array('nombre, autor', 'length', 'max'=>256),
			array('importancia, objetivo', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, importancia, objetivo, autor, duracion, creditos', 'safe', 'on'=>'search'),
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
			'grupos' => array(self::HAS_MANY, 'Grupo', 'curso_id'),
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
			'importancia' => 'Importancia',
			'objetivo' => 'Objetivo',
			'autor' => 'Autor',
			'duracion' => 'Duracion',
			'creditos' => 'Creditos',
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
		$criteria->compare('importancia',$this->importancia,true);
		$criteria->compare('objetivo',$this->objetivo,true);
		$criteria->compare('autor',$this->autor,true);
		$criteria->compare('duracion',$this->duracion);
		$criteria->compare('creditos',$this->creditos);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}