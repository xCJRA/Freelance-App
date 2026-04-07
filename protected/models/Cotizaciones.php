<?php

/**
 * This is the model class for table "cotizaciones".
 *
 * The followings are the available columns in table 'cotizaciones':
 * @property integer $id
 * @property integer $cliente_id
 * @property string $proyecto_nombre
 * @property string $total_estimado
 * @property string $buffer_porcentaje
 * @property string $total_final
 * @property string $estado
 * @property string $created_at
 *
 * The followings are the available model relations:
 * @property Clientes $cliente
 * @property CotizacionesDetalle[] $cotizacionesDetalles
 */
class Cotizaciones extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cotizaciones';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cliente_id', 'numerical', 'integerOnly'=>true),
			array('proyecto_nombre', 'length', 'max'=>50),
			array('total_estimado, buffer_porcentaje, total_final', 'length', 'max'=>10),
			array('estado', 'length', 'max'=>1),
			array('created_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, cliente_id, proyecto_nombre, total_estimado, buffer_porcentaje, total_final, estado, created_at', 'safe', 'on'=>'search'),
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
			'cotizacionesDetalles' => array(self::HAS_MANY, 'CotizacionesDetalle', 'cotizacion_id'),
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
			'proyecto_nombre' => 'Proyecto Nombre',
			'total_estimado' => 'Total Estimado',
			'buffer_porcentaje' => 'Buffer Porcentaje',
			'total_final' => 'Total Final',
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
		$criteria->compare('cliente_id',$this->cliente_id);
		$criteria->compare('proyecto_nombre',$this->proyecto_nombre,true);
		$criteria->compare('total_estimado',$this->total_estimado,true);
		$criteria->compare('buffer_porcentaje',$this->buffer_porcentaje,true);
		$criteria->compare('total_final',$this->total_final,true);
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
	 * @return Cotizaciones the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
