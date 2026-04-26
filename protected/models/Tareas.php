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
	public $proyecto_nombre;
	public $totalTareas;
	public $totalHorasEstimadas;
	public $totalHorasReales;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tareas';
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
			array('proyecto_id, nombre, descripcion', 'required'),
			array('proyecto_id', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>50),
			array('horas_estimadas, horas_reales', 'length', 'max'=>10),
			array('fecha_inicio, fecha_fin', 'length', 'max'=>10),
			array('estado', 'length', 'max'=>1),
			array('comentarios, created_at', 'safe'),
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
			'comentarios' => 'Comentarios',
			'horas_estimadas' => 'Horas Estimadas',
			'horas_reales' => 'Horas Reales',
			'fecha_inicio' => 'Fecha inicio',
			'fecha_fin' => 'Fecha final',
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
		//iniciamos variables para el calculo del footer
		$this->initValTareas();

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('proyecto_id',$this->proyecto_id);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('horas_estimadas',$this->horas_estimadas,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('created_at',$this->created_at,true);

		//calculo para el footer
		$this->totalTareas      			=  (int)  Tareas::model()->count($criteria);
		$this->totalHorasEstimadas       	= $this->getSuma('horas_estimadas', $criteria);
		$this->totalHorasReales 			= $this->getSuma('horas_reales',    $criteria);

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

	public function initValTareas(){
		$this->totalTareas		= 0;
		$this->totalHorasEstimadas 	= 0;
		$this->totalHorasReales		= 0;
	}

	private function getSuma($columna, CDbCriteria $criteria)
    {
        $tabla = $this->tableName();

        $sql = "SELECT SUM(`{$columna}`) FROM `{$tabla}`";

        if (!empty($criteria->condition))
            $sql .= " WHERE " . $criteria->condition;

        return (float) Yii::app()->db->createCommand($sql)
            ->queryScalar($criteria->params) ?: 0;
    }
}
