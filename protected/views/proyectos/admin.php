<?php
	include('jsAdmin.php');
	$this->breadcrumbs=array(
		'Proyectos'=>array('admin'),
		'Manage',
	);
?>
<div class="container-fluid">
	<div class="card">
		<!--HEADER-->  
		<div class="card-header justify-content-between align-items-center">
			<h3 class="card-title mb-0">Buscador</h3>
			<div class="card-tools">
				<div class="dropdown">
					<button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
						<i class="bi bi-card-list"></i>
					</button>
					<ul class="dropdown-menu dropdown-menu-end">
						<li> <?php echo CHtml::link('<i class="bi bi-plus-lg me-2"></i>Crear proyecto', array('proyectos/create'), array('class'=>'dropdown-item','target'=>'_blank')); ?> </li>
					</ul>
				</div>
			</div>
		</div>
		<!--SEARCH-->
		<?php 
			$this->renderPartial('_search',array(
				'model'=>$model,
			)); 
		?>
	</div>

	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'proyectos-grid',
		'dataProvider'=>$model->search(),
		'columns'=>array(
			'id',
			array(
				'name'   => 'cliente_id',
				'type'   => 'raw',
    			'value'  => 'Utilerias::getLink($data->cliente_id, "Clientes", "clientes")',
			),
			'nombre',
			'descripcion',
			'fecha_inicio',
			'fecha_fin',
			array(
				'name'   => 'tarifa_base',
				'type'   => 'text',
    			'value'  => 'Utilerias::getFormatoMoneda($data->tarifa_base)',
				'footer' => Utilerias::getFormatoMoneda($model->totalTarifa)
			),
			array(
				'name'   => 'gananciaEstimada',
				'header' => 'Ganancia estimada',
				'type'   => 'text',
    			'value'  => 'Proyectos::getGananciaAdmin("horas_estimadas",$data)',
				'footer' => Utilerias::getFormatoMoneda($model->totalGEstimada)
			),
			array(
				'name'   => 'gananciaReal',
				'header' => 'Ganancia real',
				'type'   => 'text',
    			'value'  => 'Proyectos::getGananciaAdmin("horas_reales",$data)',
				'footer' => Utilerias::getFormatoMoneda($model->totalGReal)
			),
			array(
				'name'   => 'estado',
				'type'   => 'text',
    			'value'  => 'Utilerias::getCatalogoCampo("c_statusProyecto",false,$data->estado)',
			),
			array(
				'class'=>'ButtonColumn', 
				'template' => '{view}{completar}{revivir}{update}{cancelar}', // defines el orden
				'buttons'=>array(
					'completar' => array(//completa el proyecto, solo cuando esta en un estado inciado.
						'label'   => '',           // texto del botón
						'url'     => 'Yii::app()->createUrl("proyectos/modificaEstado", array("id" => $data->id, "estado"=>"C"))',
						'visible' => '($data->estado == "I")',
						'options' => array(
							'class' => 'bi bi-hand-thumbs-up text-' . Yii::app()->params['color'],
							'title' => 'Completar este proyecto',
						),
						'click' => 'function(){
							var btn    = $(this);
							var url    = btn.attr("href");

							if (!confirm("¿Completar este proyecto?")) {
								return false;
							}

							$.ajax({
								url:      url,
								type:     "POST",
								dataType: "json",
								success: function(response) {
									if (response.status) {
										alerta("Resultado",response.message);
										$.fn.yiiGridView.update("proyectos-grid");
									} else {
										alert("Error: " + response.message);
									}
								},
								error: function() {
									alerta("Resultado", "Error en el servidor", "error");
								}
							});
							return false;
						}'
					),
					'cancelar' => array(//completa el proyecto, solo cuando esta en un estado inciado.
						'label'   => '',           // texto del botón
						'url'     => 'Yii::app()->createUrl("proyectos/modificaEstado", array("id" => $data->id, "estado"=>"CN"))',
						'visible' => '!in_array($data->estado,["CN","C"])',
						'options' => array(
							'class' => 'bi bi-x-circle text-' . Yii::app()->params['color'],
							'title' => 'Cancelar este proyecto',
						),
						'click' => 'function(){
							var btn    = $(this);
							var url    = btn.attr("href");

							if (!confirm("¿Completar este proyecto?")) {
								return false;
							}

							$.ajax({
								url:      url,
								type:     "POST",
								dataType: "json",
								success: function(response) {
									if (response.status) {
										alerta("Resultado",response.message);
										$.fn.yiiGridView.update("proyectos-grid");
									} else {
										alert("Error: " + response.message);
									}
								},
								error: function() {
									alerta("Resultado", "Error en el servidor", "error");
								}
							});
							return false;
						}'
					),
					'revivir' => array(//completa el proyecto, solo cuando esta en un estado inciado.
						'label'   => '',           // texto del botón
						'url'     => 'Yii::app()->createUrl("proyectos/modificaEstado", array("id" => $data->id, "estado"=>"A"))',
						'visible' => '$data->estado == "CN" ',// Solo cuando sea CN = Cancelado
						'options' => array(
							'class' => 'bi bi-bandaid text-' . Yii::app()->params['color'],
							'title' => 'Revivir este proyecto',
						),
						'click' => 'function(){
							var btn    = $(this);
							var url    = btn.attr("href");

							if (!confirm("¿Revivir este proyecto?")) {
								return false;
							}

							$.ajax({
								url:      url,
								type:     "POST",
								dataType: "json",
								success: function(response) {
									if (response.status) {
										alerta("Resultado",response.message);
										$.fn.yiiGridView.update("proyectos-grid");
									} else {
										alert("Error: " + response.message);
									}
								},
								error: function() {
									alerta("Resultado", "Error en el servidor", "error");
								}
							});
							return false;
						}'
					),
				)
			),
		),
	)); ?>
</div>

