<?php
/* @var $this TareasController */
/* @var $model Tareas */

$this->breadcrumbs=array(
	'Tareas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Ver Tareas', 'url'=>array('index')),
	array('label'=>'Editar Tarea', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Tarea', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tareas', 'url'=>array('admin')),
);
?>

<h1>View Tareas #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
        array(
            'name'  => 'proyecto_id',
            'label' => 'Proyecto',
			'type'  => 'raw',
            'value' => Utilerias::getLink($model->proyecto_id, 'Proyectos', 'proyectos'),
        ),
		'nombre',
		'descripcion',
		'horas_estimadas',
		'estado',
		'created_at',
	),
)); ?>
