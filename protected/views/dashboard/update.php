<?php
/* @var $this DashboardController */
/* @var $model Dashboard */

$this->breadcrumbs=array(
	'Dashboards'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Dashboard', 'url'=>array('index')),
	array('label'=>'Create Dashboard', 'url'=>array('create')),
	array('label'=>'View Dashboard', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Dashboard', 'url'=>array('admin')),
);
?>

<h1>Update Dashboard <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>