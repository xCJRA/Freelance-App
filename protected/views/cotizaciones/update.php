<?php
/* @var $this CotizacionesController */
/* @var $model Cotizaciones */

$this->breadcrumbs=array(
	'Cotizaciones'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Cotizaciones', 'url'=>array('index')),
	array('label'=>'Create Cotizaciones', 'url'=>array('create')),
	array('label'=>'View Cotizaciones', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Cotizaciones', 'url'=>array('admin')),
);
?>

<h1>Update Cotizaciones <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>