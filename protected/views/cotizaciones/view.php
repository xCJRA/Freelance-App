<?php
/* @var $this CotizacionesController */
/* @var $model Cotizaciones */

$this->breadcrumbs=array(
	'Cotizaciones'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Cotizaciones', 'url'=>array('index')),
	array('label'=>'Create Cotizaciones', 'url'=>array('create')),
	array('label'=>'Update Cotizaciones', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Cotizaciones', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cotizaciones', 'url'=>array('admin')),
);
?>

<h1>View Cotizaciones #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'cliente_id',
		'proyecto_nombre',
		'total_estimado',
		'buffer_porcentaje',
		'total_final',
		'estado',
		'created_at',
	),
)); ?>
