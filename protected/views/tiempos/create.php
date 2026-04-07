<?php
/* @var $this TiemposController */
/* @var $model Tiempos */

$this->breadcrumbs=array(
	'Tiemposes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tiempos', 'url'=>array('index')),
	array('label'=>'Manage Tiempos', 'url'=>array('admin')),
);
?>

<h1>Create Tiempos</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>