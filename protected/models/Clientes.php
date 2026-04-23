<?php

/**
 * This is the model class for table "clientes".
 *
 * The followings are the available columns in table 'clientes':
 * @property integer $id
 * @property string $nombre
 * @property string $email
 * @property string $telefono
 * @property string $rs
 * @property string $notas
 * @property string $estado
 * @property string $created_at
 *
 * The followings are the available model relations:
 * @property Cotizaciones[] $cotizaciones
 * @property Proyectos[] $proyectoses
 */
class Clientes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'clientes';
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
		return array(
			// Campos requeridos
			array('nombre, email', 'required'),

			// Validación de formato de email
			array('email', 'email'),

			// Longitudes correctas
			array('nombre',      'length', 'max'=>30),
			array('email',       'length', 'max'=>100),  // ampliado
			array('telefono',    'length', 'max'=>15),   // ampliado para formato intl.
			array('rs',          'length', 'max'=>40),
			array('moneda',      'length', 'max'=>3),
			array('fe_registro', 'length', 'max'=>10),

			// Validación de formato teléfono
			array('telefono', 'match', 
				'pattern'=>'/^[0-9\+\-\s]*$/',
				'message'=>'El teléfono solo acepta números'),

			// Campos que se les define un rango
			array('estado', 'in', 'range'=>array('A','I')),
			array('cobrarIva', 'in', 'range'=>array(0, 1)),

			// Campos seguros sin validación estricta
			array('notas, created_at', 'safe'),

			// Solo para el escenario de búsqueda
			array('id, nombre, email, telefono, rs, notas, estado, moneda, fe_registro, cobrarIva, created_at', 
				'safe', 'on'=>'search'),
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
			'cotizaciones' => array(self::HAS_MANY, 'Cotizaciones', 'cliente_id'),
			'proyectoses' => array(self::HAS_MANY, 'Proyectos', 'cliente_id'),
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
			'email' => 'Email',
			'telefono' => 'Teléfono',
			'rs' => 'Razón Social',
			'notas' => 'Notas',
			'estado' => 'Estado',
			'moneda' => 'Moneda',
			'fe_registro' => 'Fecha registro',
			'cobrarIva' => 'Cobrar IVA',
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
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('rs',$this->rs,true);
		$criteria->compare('notas',$this->notas,true);
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
	 * @return Clientes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
