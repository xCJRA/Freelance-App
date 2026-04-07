<?php
/* @var $this ProyectosController */
/* @var $model Proyectos */

$this->breadcrumbs=array(
	'Proyectos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Proyectos', 'url'=>array('index')),
	array('label'=>'Create Proyectos', 'url'=>array('create')),
	array('label'=>'View Proyectos', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Proyectos', 'url'=>array('admin')),
);
?>

<h1>Update Proyectos <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>