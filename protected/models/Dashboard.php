<?php

/**
 * This is the model class for table "dashboard".
 *
 * The followings are the available columns in table 'dashboard':
 * @property integer $id
 * @property string $title
 * @property string $tipo
 * @property string $descripcion
 * @property string $icon
 * @property string $colorClass
 * @property string $breakdown
 * @property string $activo
 * @property string $tipo_user
 * @property string $created_at
 * @property string $updated_at
 */
class Dashboard extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dashboard';
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
			array('title, tipo', 'required'),
			array('title, tipo, icon, breakdown', 'length', 'max'=>255),
			array('colorClass', 'length', 'max'=>50),
			array('estado', 'length', 'max'=>1),
			array('tipo_user', 'length', 'max'=>4),
			array('descripcion, created_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, tipo, descripcion, icon, colorClass, breakdown, estado, tipo_user, created_at', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'tipo' => 'Tipo',
			'descripcion' => 'Descripcion',
			'icon' => 'Icon',
			'colorClass' => 'Color Class',
			'breakdown' => 'Breakdown',
			'estado' => 'Estado',
			'tipo_user' => 'Tipo User',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('icon',$this->icon,true);
		$criteria->compare('colorClass',$this->colorClass,true);
		$criteria->compare('breakdown',$this->breakdown,true);
		$criteria->compare('activo',$this->activo,true);
		$criteria->compare('tipo_user',$this->tipo_user,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Dashboard the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function dashboard(){
		$user 		= Yii::app()->user->id;
		$usuario    = Usuarios::model()->findByPK($user);
		$retorno = array();

		//buscamos los dashboards
		$crit = new CDbCriteria;
		$crit->compare('tipo_user',['ALL']);
		$crit->compare('estado','A');

		$dashboards = Dashboard::model()->findAll($crit);
		if(!$dashboards){
			return $retorno;
		}
		$count = 0;
		foreach($dashboards as $dashboard){
			$total 	   = 0;
			$retorno[$count]['render'] 	= '_dashboardCard';
			$retorno[$count]['tipo'] 	= $dashboard->tipo;
			$contenido = array();
			$breakdown = array();
			//array(
			//	array('label' => 'Activos',   'value' => 5),
			//	array('label' => 'Inactivos', 'value' => 5),
			//)
			//en el switch empieza la lógica y tambien el poder agregar los breakdown
			switch($dashboard->tipo){
				case 'cliente':
					$clientes  = Clientes::model()->findAll();//aqui se debe mejorar si se quiere escalar
					$total     = count($clientes);
					$activos   = 0;
					$inactivos = 0;
					foreach($clientes as $value){
						if($value->estado == 'A'){
							$activos++;
						}else{
							$inactivos++;
						}
					}
					$breakdown = array(
						array('label'=>'Activos', 'value' => $activos),
						array('label'=>'Inactivos', 'value' => $inactivos),
					);
					break;
				case 'proyectos':
					$proyectos  = Proyectos::model()->findAll();//aqui se debe mejorar si se quiere escalar
					$total     = count($proyectos);
					$completados   = 0;
					$iniciados     = 0;
					$otros		   = 0;
					foreach($proyectos as $value){
						if($value->estado == 'C'){
							$completados++;
						}elseif($value->estado == 'I'){
							$iniciados++;
						}else{
							$otros++;
						}
					}
					$breakdown = array(
						array('label'=>'Completados', 'value' => $completados),
						array('label'=>'Iniciados', 'value' => $iniciados),
						array('label'=>'Otros', 'value' => $otros),
					);
					break;
			}
			
			$contenido  = array(
				'title'      => $dashboard->title,
				'total'      => $total,
				'icon'       => $dashboard->icon,
				'colorClass' => $dashboard->colorClass,
				'breakdown'  => $breakdown
			);

			$retorno[$count]['contenido'] = $contenido;
			$count++;
		}
		return $retorno;
	}
}
