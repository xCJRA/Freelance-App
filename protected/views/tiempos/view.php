<?php
/* @var $this TiemposController */
/* @var $model Tiempos */

$this->breadcrumbs=array(
	'Tiempos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Tiempos', 'url'=>array('index')),
	array('label'=>'Create Tiempos', 'url'=>array('create')),
	array('label'=>'Update Tiempos', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Tiempos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tiempos', 'url'=>array('admin')),
);
?>

<h1>View Tiempos #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'proyecto_id',
		'tareas_id',
		'tipo',
		'descripcion',
		'horas',
		'facturable',
		'fecha',
	),
)); ?>
