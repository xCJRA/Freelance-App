<?php
/* @var $this CotizacionesController */
/* @var $model Cotizaciones */

$this->breadcrumbs=array(
	'Cotizaciones'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Cotizaciones', 'url'=>array('index')),
	array('label'=>'Manage Cotizaciones', 'url'=>array('admin')),
);
?>

<h1>Create Cotizaciones</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>