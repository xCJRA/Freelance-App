<?php
/* @var $this ProyectosController */
/* @var $model Proyectos */

$this->breadcrumbs=array(
	'Proyectos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Proyectos', 'url'=>array('index')),
	array('label'=>'Create Proyectos', 'url'=>array('create')),
	array('label'=>'Update Proyectos', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Proyectos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Proyectos', 'url'=>array('admin')),
);
?>

<h1>View Proyectos #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
        array(
            'name'  => 'cliente_id',
            'label' => 'Cliente',
            'value' => Utilerias::getName($model->cliente_id,'nombre',new Clientes),
        ),
		'nombre',
		'descripcion',
		'fecha_inicio',
		'fecha_fin',
		'estado',
		'tarifa_base',
		'created_at',
	),
)); ?>
