<?php

/**
 * This is the model class for table "Diplomados_Cursos".
 *
 * The followings are the available columns in table 'Diplomados_Cursos':
 * @property integer $id
 * @property integer $curso_id
 * @property integer $diplomado_id
 * @property integer $estatus
 *
 * The followings are the available model relations:
 * @property Diplomados $diplomado
 * @property Cursos $curso
 */
class DiplomadoCurso extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return DiplomadoCurso the static model class
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
		return 'Diplomados_Cursos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('curso_id, diplomado_id, estatus', 'required'),
			array('curso_id, diplomado_id, estatus', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, curso_id, diplomado_id, estatus', 'safe', 'on'=>'search'),
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
			'diplomado' => array(self::BELONGS_TO, 'Diplomado', 'diplomado_id'),
			'curso' => array(self::BELONGS_TO, 'Curso', 'curso_id'),
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
			'diplomado_id' => 'Diplomado',
			'estatus' => 'Estatus',
		);
	}
	 
	public function markToDelete()
	{
		$tmp=$this->search()->getData();
		foreach($tmp as $item)
		{
			$item->estatus=100;
			$item->save();
		}
		
	}
    
	public function customUpdate()
	{
		$tmp=$this->search()->getData();
		$this->estatus=1;
		if(count($tmp)>0)
		{
			$tmp=$tmp[0];
			$this->id =$tmp->id;
		}
		
		$this->save();	
		//echo '<pre>Curso Diplomado '; print_r($this->attributes); echo '</pre>';
	
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
		$criteria->compare('diplomado_id',$this->diplomado_id);
		$criteria->compare('estatus',$this->estatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}