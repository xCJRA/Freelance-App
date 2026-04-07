<?php
/**
 * LoginForm — Maneja la autenticación del usuario
 */
class LoginForm extends CFormModel
{
    public $username;
    public $password;
    public $rememberMe;

    private $_identity;

    public function rules()
    {
        return array(
            // Requeridos
            array('username, password', 'required',
                'message' => '{attribute} es obligatorio.'
            ),
            // Longitudes mínimas para evitar consultas innecesarias a BD
            array('username', 'length', 'min' => 4, 'max' => 50),
            array('password', 'length', 'min' => 8, 'max' => 255),
            // RememberMe debe ser booleano
            array('rememberMe', 'boolean'),
            // Autenticación — se ejecuta al final, después de las validaciones anteriores
            array('password', 'authenticate'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'username'   => 'Usuario',
            'password'   => 'Contraseña',
            'rememberMe' => 'Recordarme',
        );
    }

    /**
     * Valida credenciales contra la BD vía UserIdentity
     */
    public function authenticate($attribute, $params)
    {
        // Solo autenticar si no hay errores previos (username vacío, etc.)
        if (!$this->hasErrors())
        {
            $this->_identity = new UserIdentity($this->username, $this->password);

            if (!$this->_identity->authenticate())
            {
                switch ($this->_identity->errorCode)
                {
                    case UserIdentity::ERROR_USERNAME_INVALID:
                        $this->addError('username', 'El usuario no existe.');
                        break;

                    case UserIdentity::ERROR_PASSWORD_INVALID:
                        $this->addError('password', 'La contraseña es incorrecta.');
                        break;

                    case UserIdentity::ERROR_ACCOUNT_INACTIVE:
                        $this->addError('username', 'Cuenta desactivada. Contacta al administrador.');
                        break;

                    case UserIdentity::ERROR_ACCOUNT_LOCKED:
                        $this->addError('username', 'Cuenta bloqueada por múltiples intentos. Intenta en 15 minutos.');
                        break;

                    default:
                        $this->addError('password', 'Credenciales incorrectas.');
                        break;
                }
            }
        }
    }

    /**
     * Inicia sesión si la autenticación fue exitosa
     */
    public function login()
    {
        if ($this->_identity === null)
        {
            $this->_identity = new UserIdentity($this->username, $this->password);
            $this->_identity->authenticate();
        }

        if ($this->_identity->errorCode === UserIdentity::ERROR_NONE)
        {
            // rememberMe = 30 días | sin rememberMe = sesión del navegador
            $duration = $this->rememberMe ? 3600 * 24 * 30 : 0;
            Yii::app()->user->login($this->_identity, $duration);
            return true;
        }
 
        return false;
    }
}