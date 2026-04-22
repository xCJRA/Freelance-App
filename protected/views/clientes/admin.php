<?php include('jsAdmin.php'); ?>
<?php
	$this->breadcrumbs=array(
		'Clientes'=>array('index'),
		'Manage',
	);
?>
<div class="container-fluid">
	<h1>Listado de clientes</h1>
	<div class="card">
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
				'class'=>'CButtonColumn',
			),
		),
	)); ?>
</div>
