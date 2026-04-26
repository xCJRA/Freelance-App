<?php
	include('jsAdmin.php');
	$this->breadcrumbs=array(
		'Tareas'=>array('index'),
		'Manage',
	);
?>

<div class="container-fluid">
	<div class="card">
		<!--HEADER-->  
		<div class="card-header d-flex justify-content-between align-items-center">
			<h3 class="card-title mb-0">Listado de tareas</h3>
		</div>
	</div>

	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'tareas-grid',
		'dataProvider'=>$model->search(),
		'columns'=>array(
			array(
				'name'   			=> 'proyecto_id',
				'type'   			=> 'raw',
				'value'  			=> 'Utilerias::getLink($data->proyecto_id, "Proyectos", "proyectos")',
				'footer' 			=> 'Total: ' . $model->totalTareas,
				'footerHtmlOptions' => array('style' => 'text-align:center; font-weight:bold')
			),
			'nombre',
			'descripcion',
			array(
				'name' 	 			=> 'horas_estimadas',
				'type'	 			=> 'raw',
            	'htmlOptions'       => array('style' => 'text-align:center'),
				'footer' 			=> $model->totalHorasEstimadas,
				'footerHtmlOptions' => array('style' => 'text-align:center; font-weight:bold')
			),
			array(
				'name' 	 => 'horas_reales',
				'type'	 => 'raw',
            	'htmlOptions'       => array('style' => 'text-align:center'),
            	'footer' => $model->totalHorasReales,
				'footerHtmlOptions' => array('style' => 'text-align:center; font-weight:bold')
			),
			array(
				'name'   => 'estado',
				'type'   => 'raw',
				'value'  => 'Utilerias::getCatalogoCampo("c_statusTarea", false, $data->estado)',
			),
			array(
				'class'=>'ButtonColumn',
			),
		),
	)); ?>
</div>
