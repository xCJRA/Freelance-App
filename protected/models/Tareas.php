<?php

/**
 * This is the model class for table "tareas".
 *
 * The followings are the available columns in table 'tareas':
 * @property integer $id
 * @property integer $proyecto_id
 * @property string $nombre
 * @property string $descripcion
 * @property string $horas_estimadas
 * @property string $estado
 * @property string $created_at
 *
 * The followings are the available model relations:
 * @property Proyectos $proyecto
 * @property Tiempos[] $tiemposes
 */
class Tareas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tareas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('proyecto_id', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>50),
			array('horas_estimadas', 'length', 'max'=>10),
			array('estado', 'length', 'max'=>1),
			array('descripcion, created_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, proyecto_id, nombre, descripcion, horas_estimadas, estado, created_at', 'safe', 'on'=>'search'),
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
			'proyecto' => array(self::BELONGS_TO, 'Proyectos', 'proyecto_id'),
			'tiemposes' => array(self::HAS_MANY, 'Tiempos', 'tareas_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'proyecto_id' => 'Proyecto',
			'nombre' => 'Nombre',
			'descripcion' => 'Descripcion',
			'horas_estimadas' => 'Horas Estimadas',
			'estado' => 'Estado',
			'created_at' => 'Created At',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('proyecto_id',$this->proyecto_id);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('horas_estimadas',$this->horas_estimadas,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('created_at',$this->created_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tareas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
