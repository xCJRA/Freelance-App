<?php
	$this->breadcrumbs=array(
		'Proyectos'=>array('index'),
		$model->id=>array('view','id'=>$model->id),
		'Update',
	);
?>

<h1>Editar Proyecto #<?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>