<?php
	include('jsAdmin.php');
	$this->breadcrumbs=array(
		'Cotizaciones'=>array('admin'),
		'Manage',
	);
?>
<div class="container-fluid">
	<div class="card">
		<!--HEADER-->  
		<div class="card-header d-flex justify-content-between align-items-center">
			<h3 class="card-title mb-0">Listado de cotizaciones</h3>
			<div class="card-tools">
				<div class="dropdown">
					<button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
						<i class="bi bi-card-list"></i>
					</button>
					<ul class="dropdown-menu dropdown-menu-end">
						<li> <?php echo CHtml::link('<i class="bi bi-plus-lg me-2"></i>Crear cotizacion', array('cotizaciones/create'), array('class'=>'dropdown-item','target'=>'_blank')); ?> </li>
					</ul>
				</div>
			</div>
		</div>
		<!--SEARCH-->
		<?php $this->renderPartial('_search',array(
			'model'=>$model,
		)); ?>
	</div>

	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'cotizaciones-grid',
		'dataProvider'=>$model->search(),
		//'filter'=>$model,
		'columns'=>array(
			'id',
			'cliente_id',
			'proyecto_nombre',
			'total_estimado',
			'buffer_porcentaje',
			'total_final',
			array(
				'class'=>'ButtonColumn',
			),
		),
	)); ?>
</div>
