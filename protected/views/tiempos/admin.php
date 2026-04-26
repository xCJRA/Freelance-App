<?php
$this->breadcrumbs=array(
	'Tiempos'=>array('admin'),
	'Manage',
);
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tiempos-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'proyecto_id',
		'tareas_id',
		'tipo',
		'descripcion',
		'horas',
		/*
		'facturable',
		'fecha',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
