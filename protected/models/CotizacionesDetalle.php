<?php

/**
 * This is the model class for table "cotizaciones_detalle".
 *
 * The followings are the available columns in table 'cotizaciones_detalle':
 * @property integer $id
 * @property integer $cotizacion_id
 * @property integer $servicio_id
 * @property string $cantidad
 * @property string $horas_estimadas
 * @property string $precio_unitario
 * @property string $subtotal
 *
 * The followings are the available model relations:
 * @property Cotizaciones $cotizacion
 * @property Servicios $servicio
 */
class CotizacionesDetalle extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cotizaciones_detalle';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cotizacion_id, servicio_id', 'numerical', 'integerOnly'=>true),
			array('cantidad, horas_estimadas, precio_unitario, subtotal', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, cotizacion_id, servicio_id, cantidad, horas_estimadas, precio_unitario, subtotal', 'safe', 'on'=>'search'),
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
			'cotizacion' => array(self::BELONGS_TO, 'Cotizaciones', 'cotizacion_id'),
			'servicio' => array(self::BELONGS_TO, 'Servicios', 'servicio_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'cotizacion_id' => 'Cotizacion',
			'servicio_id' => 'Servicio',
			'cantidad' => 'Cantidad',
			'horas_estimadas' => 'Horas Estimadas',
			'precio_unitario' => 'Precio Unitario',
			'subtotal' => 'Subtotal',
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
		$criteria->compare('cotizacion_id',$this->cotizacion_id);
		$criteria->compare('servicio_id',$this->servicio_id);
		$criteria->compare('cantidad',$this->cantidad,true);
		$criteria->compare('horas_estimadas',$this->horas_estimadas,true);
		$criteria->compare('precio_unitario',$this->precio_unitario,true);
		$criteria->compare('subtotal',$this->subtotal,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CotizacionesDetalle the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
