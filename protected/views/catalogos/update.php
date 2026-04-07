<?php
/* @var $this CatalogosController */
/* @var $model Catalogos */

$this->breadcrumbs=array(
	'Catalogoses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Catalogos', 'url'=>array('index')),
	array('label'=>'Create Catalogos', 'url'=>array('create')),
	array('label'=>'View Catalogos', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Catalogos', 'url'=>array('admin')),
);
?>

<h1>Update Catalogos <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>