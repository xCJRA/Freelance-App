<?php
	$this->breadcrumbs=array(
		'Tareas'=>array('admin'),
		$model->id=>array('view','id'=>$model->id),
		'Update',
	);
?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>