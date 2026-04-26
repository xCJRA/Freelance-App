<?php
	$this->breadcrumbs=array(
		'Tiempos'=>array('admin'),
		$model->id=>array('view','id'=>$model->id),
		'Update',
	);
?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>