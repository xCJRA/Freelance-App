<?php

class Utilerias extends CActiveRecord
{
	public function tableName()
	{
		return 'activerecord_log';
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public static function getName($id,$campo,$modelo){
		$retorno = '';
		$resultado = $modelo::model()->findByPK($id);
		if($resultado){
			$retorno = $resultado->$campo;
		}
		return $retorno;
	}
	//Función generica para obtener un link que redirecciona al módulo solicitado desde el id.
	public static function getLink($id, $model, $controller, $action = 'view'){
		$retorno = '-';
		$modelo = $model::model()->findByPK($id);
		if($modelo){
			$retorno = CHtml::link($modelo->nombre, array("$controller/$action","id"=>$modelo->id));
		}
		return $retorno;
	}

	public static function verInfoUser(){
		// ID del usuario logueado
        $userId = Yii::app()->user->id;

        // ================================================
        // FORMA 1 — Ver qué roles tiene asignados en RBAC
        // ================================================
        $auth  = Yii::app()->authManager;
        $roles = $auth->getRoles($userId);

        echo "<h3>Roles asignados:</h3>";
        echo "<pre>";
        print_r($roles);
        echo "</pre>";

        // ================================================
        // FORMA 2 — Solo los nombres de los roles (más limpio)
        // ================================================
        echo "<h3>Nombres de roles:</h3>";
        foreach ($roles as $nombre => $rol) {
            echo "- " . $nombre . "<br>";
        }

        // ================================================
        // FORMA 3 — Verificar un permiso específico
        // ================================================
        echo "<h3>Permisos:</h3>";
        $permisos = array(
            'crearUsuario',
            'editarUsuario',
            'eliminarUsuario',
            'verUsuarios',
            'verPerfil',
        );

        foreach ($permisos as $permiso) {
            $tiene = Yii::app()->user->checkAccess($permiso);
            echo "- {$permiso}: " . ($tiene ? '✅ SI' : '❌ NO') . "<br>";
        }

        // ================================================
        // FORMA 4 — El rol guardado en sesión (setState)
        // ================================================
        echo "<h3>Rol en sesión:</h3>";
        echo Yii::app()->user->getState('rol');
	}
}
