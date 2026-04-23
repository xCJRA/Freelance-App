<?php
/**
 * Modelo para la tabla 'usuarios'
 *
 * @property integer $id
 * @property string  $username
 * @property string  $email
 * @property string  $password
 * @property string  $salt
 * @property string  $nombre
 * @property string  $apellido
 * @property string  $rol
 * @property integer $estado
 * @property string  $ultimo_login
 * @property integer $intentos_fallidos
 * @property string  $bloqueado_hasta
 * @property string  $created_at
 * @property string  $updated_at
 */
class Usuarios extends CActiveRecord
{
    // Campo virtual: solo para el formulario, NUNCA se guarda directo en BD
    public $password_repeat;
    public $password_nueva; // Para cambio de contraseña

    /**
     * Nombre de la tabla en BD
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'usuarios';
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

    // =========================================================
    //  REGLAS DE VALIDACIÓN
    // =========================================================
    public function rules()
    {
        return array(
            // Campos requeridos en creación
            array('username, email, nombre, apellido', 'required'),
            array('password', 'required', 'on' => 'create'), // Solo al crear

            // Longitudes
            array('username', 'length', 'min' => 4, 'max' => 50),
            array('email',    'length', 'max' => 100),
            array('password', 'length', 'min' => 8, 'max' => 255, 'on' => 'create'),
            array('nombre, apellido', 'length', 'max' => 100),

            // Formatos
            array('email',    'email'),
            array('username', 'match',
                'pattern' => '/^[a-zA-Z0-9_]+$/',
                'message'  => 'Solo letras, números y guión bajo.'
            ),

            // Únicos
            array('username', 'unique'),
            array('email',    'unique'),

            // Valores permitidos
            array('rol',    'in', 'range' => array('ADM', 'USER', 'MOD')),

            // Confirmación de contraseña
            array('password_repeat', 'compare',
                'compareAttribute' => 'password',
                'on'               => 'create',
                'message'          => 'Las contraseñas no coinciden.'
            ),

            // Búsqueda (no valida, solo filtra)
            array('id, username, email, nombre, apellido, rol, estado', 'safe', 'on' => 'search'),
        );
    }
    
    public function relations()
    {
        return array(
            // 'pedidos' => array(self::HAS_MANY, 'Pedidos', 'usuario_id'),
        );
    }

    // =========================================================
    //  LABELS para formularios
    // =========================================================
    public function attributeLabels()
    {
        return array(
            'id'                => 'ID',
            'username'          => 'Usuario',
            'email'             => 'Correo Electrónico',
            'password'          => 'Contraseña',
            'password_repeat'   => 'Confirmar Contraseña',
            'salt'              => 'Salt',
            'nombre'            => 'Nombre',
            'apellido'          => 'Apellido',
            'rol'               => 'Rol',
            'estado'            => 'Estatus',
            'ultimo_login'      => 'Último Login',
            'intentos_fallidos' => 'Intentos Fallidos',
            'created_at'        => 'Creado',
            'updated_at'        => 'Actualizado',
        );
    }

    // =========================================================
    //  EVENTOS DEL MODELO (beforeSave)
    // =========================================================
    protected function beforeSave()
    {
        if (parent::beforeSave()) {

            if ($this->isNewRecord) {
                // Generar salt único y hashear password al CREAR
                $this->salt     = $this->generarSalt();
                $this->password = $this->hashPassword($this->password, $this->salt);
            } else {
                // Si se está cambiando la contraseña al EDITAR
                if (!empty($this->password_nueva)) {
                    $this->salt     = $this->generarSalt();
                    $this->password = $this->hashPassword($this->password_nueva, $this->salt);
                }
            }

            return true;
        }
        return false;
    }

    // =========================================================
    //  MÉTODOS DE UTILIDAD
    // =========================================================

    /**
     * Genera un salt aleatorio seguro
     */
    public function generarSalt()
    {
        return bin2hex(openssl_random_pseudo_bytes(32));
    }

    /**
     * Hashea la contraseña con el salt
     * Usamos SHA256 + salt (compatible con PHP 5.3 de Yii 1.1)
     */
    public function hashPassword($password, $salt)
    {
        return hash('sha256', $salt . $password);
    }

    /**
     * Valida si una contraseña en texto plano coincide con el hash guardado
     */
    public function validarPassword($passwordIngresada)
    {
        return $this->password === $this->hashPassword($passwordIngresada, $this->salt);
    }

    /**
     * Para el buscador de Gii (CGridView / search)
     */
    public function search()
    {
        $criteria = new CDbCriteria;
        $criteria->compare('id',       $this->id);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('email',    $this->email,    true);
        $criteria->compare('nombre',   $this->nombre,   true);
        $criteria->compare('apellido', $this->apellido, true);
        $criteria->compare('rol',      $this->rol,      true);
        $criteria->compare('estado',   $this->estado);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array('pageSize' => 20),
        ));
    }
    /**
     * Asigna un rol RBAC al usuario
     * Se llama después de guardar el usuario
     */
    public function asignarRol($rol)
    {
        $auth = Yii::app()->authManager;

        // Primero revocar cualquier rol anterior
        $auth->revoke($rol, $this->id);

        // Asignar el nuevo rol
        $auth->assign($rol, $this->id);
    }

    /**
     * Obtener el rol actual del usuario desde RBAC
     */
    public function getRolActual()
    {
        $auth  = Yii::app()->authManager;
        $roles = array('admin', 'moderador', 'usuario');

        foreach ($roles as $rol) {
            if ($auth->isAssigned($rol, $this->id)) {
                return $rol;
            }
        }
        return null;
    }

    protected function afterSave()
    {
        parent::afterSave();
        // Si es nuevo registro, asignar rol seleccionado en RBAC
        if ($this->isNewRecord) {
            $this->asignarRol($this->rol); // $this->rol = 'admin','moderador','usuario'
        }
    }
}