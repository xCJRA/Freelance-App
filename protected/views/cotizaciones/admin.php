<?php
	include('jsAdmin.php');
	$this->breadcrumbs=array(
		'Cotizaciones'=>array('index'),
		'Manage',
	);
?>

<h1>Manage Cotizaciones</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

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
