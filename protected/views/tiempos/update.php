<?php
/* @var $this TiemposController */
/* @var $model Tiempos */

$this->breadcrumbs=array(
	'Tiempos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tiempos', 'url'=>array('index')),
	array('label'=>'Create Tiempos', 'url'=>array('create')),
	array('label'=>'View Tiempos', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Tiempos', 'url'=>array('admin')),
);
?>

<h1>Update Tiempos <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>