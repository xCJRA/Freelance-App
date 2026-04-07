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
}
