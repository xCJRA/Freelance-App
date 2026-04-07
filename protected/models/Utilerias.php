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
}
