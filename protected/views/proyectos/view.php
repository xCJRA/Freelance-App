<?php
	include('jsView.php');
	$this->breadcrumbs=array(
		'Proyectos'=>array('admin'),
		$model->id,
	);
?>
<div class="card">
	<!--NAVS-->  
	<ul class="nav nav-tabs" id="myTab" role="tablist">
		<li class="nav-item" role="presentation">
			<button class="nav-link active" id="pest1" data-bs-toggle="tab" data-bs-target="#info" type="button" role="tab" aria-controls="info" aria-selected="true">
				Información
			</button>
		</li>
		<li class="nav-item" role="presentation">
			<button class="nav-link" id="pest2" data-bs-toggle="tab" data-bs-target="#tareas" type="button" role="tab" aria-controls="tareas" aria-selected="false">
				Tareas
			</button>
		</li>
	</ul>
	<br>
	<div class="tab-content">
		<div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="pest1">
			<?php $this->renderPartial('_tabViewInformacion', array('model'=>$model)); ?>
		</div>

		<div class="tab-pane fade" id="tareas" role="tabpanel" aria-labelledby="pest2">
			<?php $this->renderPartial('_tabViewTareas', array('model'=>$model,'tareas'=>$tareas)); ?>
		</div>
	</div>
</div>