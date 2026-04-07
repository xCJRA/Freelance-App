<?php
/* @var $this CatalogosController */
/* @var $model Catalogos */

$this->breadcrumbs=array(
	'Catalogoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Catalogos', 'url'=>array('index')),
	array('label'=>'Manage Catalogos', 'url'=>array('admin')),
);
?>

<h1>Create Catalogos</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>