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
		<div class="card-header d-flex justify-content-between align-items-center">
			<h3 class="card-title mb-0">Listado de proyectos</h3>
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
				'name'   => 'estado',
				'type'   => 'text',
    			'value'  => 'Utilerias::getCatalogoCampo("c_statusProyecto",false,$data->estado)',
			),
			array(
				'class'=>'ButtonColumn',
			),
		),
	)); ?>
</div>

