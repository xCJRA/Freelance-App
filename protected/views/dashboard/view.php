<?php
/* @var $this DashboardController */
/* @var $model Dashboard */

$this->breadcrumbs=array(
	'Dashboards'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Dashboard', 'url'=>array('index')),
	array('label'=>'Create Dashboard', 'url'=>array('create')),
	array('label'=>'Update Dashboard', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Dashboard', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Dashboard', 'url'=>array('admin')),
);
?>

<h1>View Dashboard #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'tipo',
		'descripcion',
		'icon',
		'colorClass',
		'breakdown',
		'estado',
		'tipo_user',
		'created_at',
		'updated_at',
	),
)); ?>
