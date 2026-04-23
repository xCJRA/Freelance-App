<?php
	$this->breadcrumbs=array(
		'Tareas'=>array('index'),
		$model->id=>array('view','id'=>$model->id),
		'Update',
	);
?>

<h1>Update Tareas <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>