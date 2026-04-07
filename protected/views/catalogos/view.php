<?php
/* @var $this CatalogosController */
/* @var $model Catalogos */

$this->breadcrumbs=array(
	'Catalogoses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Catalogos', 'url'=>array('index')),
	array('label'=>'Create Catalogos', 'url'=>array('create')),
	array('label'=>'Update Catalogos', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Catalogos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Catalogos', 'url'=>array('admin')),
);
?>

<h1>View Catalogos #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'tipo',
		'idCat',
		'descripcion',
		'refnr',
		'estado',
	),
)); ?>
