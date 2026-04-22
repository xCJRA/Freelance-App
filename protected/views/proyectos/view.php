<?php
	$this->breadcrumbs=array(
		'Proyectos'=>array('index'),
		$model->id,
	);
?>

<h4>View Proyectos #<?php echo $model->id; ?></h4>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
        array(
            'name'  => 'cliente_id',
            'label' => 'Cliente',
			'type'  => 'raw',
            'value' => Utilerias::getLink($model->cliente_id, 'Clientes', 'clientes'),
        ),
		'nombre',
		'descripcion',
		'fecha_inicio',
		'fecha_fin',
        array(
            'name'  => 'estado',
            'label' => 'Estado',
			'type'  => 'raw',
            'value' => Utilerias::getCatalogoCampo('c_statusProyecto',false,$model->estado),
        ),
		'tarifa_base',
	),
)); ?>
