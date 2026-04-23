<?php

/**
 * This is the model class for table "proyectos".
 *
 * The followings are the available columns in table 'proyectos':
 * @property integer $id
 * @property integer $cliente_id
 * @property string $nombre
 * @property string $descripcion
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property string $estado
 * @property string $tarifa_base
 * @property string $created_at
 *
 * The followings are the available model relations:
 * @property Clientes $cliente
 * @property Tareas[] $tareases
 * @property Tiempos[] $tiemposes
 */
class Proyectos extends CActiveRecord
{
	public $nombreCliente;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'proyectos';
	}

    /**
     * Aquí adjuntamos el behavior de auditoría.
     * Con solo estas líneas, este modelo queda completamente auditado.
     */
    public function behaviors()
    {
        return array(
            'audit' => array(
                'class' => 'AuditBehavior',
            ),
			'timestamp' => array(
				'class'           => 'zii.behaviors.CTimestampBehavior',
				'createAttribute' => 'created_at',  // campo al crear
				'updateAttribute' => null,           // si no tienes updated_at, ponlo null
				'timestampExpression' => new CDbExpression('NOW()'), // formato datetime
			),
        );
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cliente_id', 'required'),
			array('cliente_id', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>40),
			array('estado', 'length', 'max'=>1),
			array('tarifa_base', 'length', 'max'=>10),
			array('descripcion, fecha_inicio, fecha_fin, created_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, cliente_id, nombre, descripcion, fecha_inicio, fecha_fin, estado, tarifa_base, created_at', 'safe', 'on'=>'search'),
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
			'cliente' => array(self::BELONGS_TO, 'Clientes', 'cliente_id'),
			'tareases' => array(self::HAS_MANY, 'Tareas', 'proyecto_id'),
			'tiemposes' => array(self::HAS_MANY, 'Tiempos', 'proyecto_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'cliente_id' => 'Cliente',
			'nombre' => 'Nombre del proyecto',
			'descripcion' => 'Descripcion del proyecto',
			'fecha_inicio' => 'Fecha Inicio',
			'fecha_fin' => 'Fecha Fin',
			'estado' => 'Estado',
			'tarifa_base' => 'Tarifa Base',
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
		$criteria->compare('cliente_id',$this->cliente_id);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('fecha_inicio',$this->fecha_inicio,true);
		$criteria->compare('fecha_fin',$this->fecha_fin,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('tarifa_base',$this->tarifa_base,true);
		$criteria->compare('created_at',$this->created_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Proyectos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
