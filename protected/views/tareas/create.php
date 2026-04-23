<?php
	$this->breadcrumbs=array(
		'Tareas'=>array('index'),
		'Create',
	);
?>
<h1>Create Tareas</h1>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>