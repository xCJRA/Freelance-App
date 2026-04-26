<?php
	$this->breadcrumbs=array(
		'Tiempos'=>array('index'),
		$model->id,
	);
?>

<h1>View Tiempos #<?php echo $model->id; ?></h1>

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
		array(
			'name'  => 'tareas_id',
			'label' => 'Tarea',
			'type'  => 'raw',
			'value' => Utilerias::getLink($model->tareas_id, 'Tareas', 'tareas'),
		),
		array(
			'name'  => 'tipo',
			'label' => 'Tipo',
			'type'  => 'raw',
			'value' => Utilerias::getCatalogoCampo('c_tiempoTipo',false,$model->tipo),
		),
		'descripcion',
		'horas',
		array(
			'name'  => 'facturable',
			'label' => 'Facturable',
			'type'  => 'raw',
			'value' => Utilerias::getCatalogoCampo('c_tiempoFacturable',false,$model->facturable),
		),
		'fecha',
	),
)); ?>
