<?php include('jsAdmin.php'); ?>
<?php
	$this->breadcrumbs=array(
		'Clientes'=>array('index'),
		'Manage',
	);
?>
<div class="container-fluid">
	<div class="card">
		<!--HEADER-->  
		<div class="card-header d-flex justify-content-between align-items-center">
			<h3 class="card-title mb-0">Listado de clientes</h3>
			<div class="card-tools">
				<div class="dropdown">
					<button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
						<i class="bi bi-card-list"></i>
					</button>
					<ul class="dropdown-menu dropdown-menu-end">
						<li> <?php echo CHtml::link('<i class="bi bi-plus-lg me-2"></i>Crear cliente', array('clientes/create'), array('class'=>'dropdown-item','target'=>'_blank')); ?> </li>
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
	<!--TABLA-->
	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'clientes-grid',
		'dataProvider'=>$model->search(),
		'columns'=>array(
			'id',
			'nombre',
			'email',
			'telefono',
			'rs',
			'notas',
			array(
				'class'=>'ButtonColumn', //clase personalizada
				'template' => '{view} {update} {delete}', // Pisa el template
				'buttons'  => array(
				),
			),
		),
	)); ?>
</div>
