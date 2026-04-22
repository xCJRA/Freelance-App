<?php

/**
 * This is the model class for table "columnas".
 *
 * The followings are the available columns in table 'columnas':
 * @property string $id
 * @property string $tipo
 * @property string $controlador
 * @property string $accion
 * @property string $subtipo
 * @property string $tabla
 * @property string $columna
 * @property string $etiqueta
 * @property string $tipo_conversion
 * @property string $modelo
 * @property string $funcion
 * @property string $parametros
 * @property string $validador
 * @property string $opciones_html
 * @property string $valor
 * @property string $formato
 * @property integer $visible
 * @property integer $activo
 * @property integer $graficar
 * @property string $usrnr
 * @property string $tipo_usuario
 * @property string $socnr
 * @property integer $orden
 * @property string $footer
 * @property string $footer_opciones
 * @property string $clase_css
 * @property string $created_at
 * @property string $updated_at
 */
class Columnas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'columnas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipo, controlador, accion, tabla, columna, created_at, updated_at', 'required'),
			array('visible, activo, graficar, orden', 'numerical', 'integerOnly'=>true),
			array('tipo', 'length', 'max'=>20),
			array('controlador, accion, subtipo, tabla, columna, tipo_conversion, tipo_usuario', 'length', 'max'=>50),
			array('modelo, funcion, formato, usrnr, footer, clase_css', 'length', 'max'=>100),
			array('socnr', 'length', 'max'=>10),
			array('etiqueta, parametros, validador, opciones_html, valor, footer_opciones', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, tipo, controlador, accion, subtipo, tabla, columna, etiqueta, tipo_conversion, modelo, funcion, parametros, validador, opciones_html, valor, formato, visible, activo, graficar, usrnr, tipo_usuario, socnr, orden, footer, footer_opciones, clase_css, created_at, updated_at', 'safe', 'on'=>'search'),
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
			'tipo' => 'Tipo',
			'controlador' => 'Controlador',
			'accion' => 'Accion',
			'subtipo' => 'Subtipo',
			'tabla' => 'Tabla',
			'columna' => 'Columna',
			'etiqueta' => 'Etiqueta',
			'tipo_conversion' => 'Tipo Conversion',
			'modelo' => 'Modelo',
			'funcion' => 'Funcion',
			'parametros' => 'Parametros',
			'validador' => 'Validador',
			'opciones_html' => 'Opciones Html',
			'valor' => 'Valor',
			'formato' => 'Formato',
			'visible' => 'Visible',
			'activo' => 'Activo',
			'graficar' => 'Graficar',
			'usrnr' => 'Usrnr',
			'tipo_usuario' => 'Tipo Usuario',
			'socnr' => 'Socnr',
			'orden' => 'Orden',
			'footer' => 'Footer',
			'footer_opciones' => 'Footer Opciones',
			'clase_css' => 'Clase Css',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('controlador',$this->controlador,true);
		$criteria->compare('accion',$this->accion,true);
		$criteria->compare('subtipo',$this->subtipo,true);
		$criteria->compare('tabla',$this->tabla,true);
		$criteria->compare('columna',$this->columna,true);
		$criteria->compare('etiqueta',$this->etiqueta,true);
		$criteria->compare('tipo_conversion',$this->tipo_conversion,true);
		$criteria->compare('modelo',$this->modelo,true);
		$criteria->compare('funcion',$this->funcion,true);
		$criteria->compare('parametros',$this->parametros,true);
		$criteria->compare('validador',$this->validador,true);
		$criteria->compare('opciones_html',$this->opciones_html,true);
		$criteria->compare('valor',$this->valor,true);
		$criteria->compare('formato',$this->formato,true);
		$criteria->compare('visible',$this->visible);
		$criteria->compare('activo',$this->activo);
		$criteria->compare('graficar',$this->graficar);
		$criteria->compare('usrnr',$this->usrnr,true);
		$criteria->compare('tipo_usuario',$this->tipo_usuario,true);
		$criteria->compare('socnr',$this->socnr,true);
		$criteria->compare('orden',$this->orden);
		$criteria->compare('footer',$this->footer,true);
		$criteria->compare('footer_opciones',$this->footer_opciones,true);
		$criteria->compare('clase_css',$this->clase_css,true);
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
	 * @return Columnas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
