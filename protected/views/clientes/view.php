<?php
$this->breadcrumbs=array(
	'Clientes'=>array('admin'),
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
			<button class="nav-link" id="pest2" data-bs-toggle="tab" data-bs-target="#proyectos" type="button" role="tab" aria-controls="proyectos" aria-selected="false">
				Proyectos
			</button>
		</li>
	</ul>
	<br>
	<div class="tab-content">
		<div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="pest1">
			<?php $this->renderPartial('_tabViewInformacion', array('model'=>$model)); ?>
		</div>

		<div class="tab-pane fade" id="proyectos" role="tabpanel" aria-labelledby="pest2">
			<?php $this->renderPartial('_tabViewProyectos', array('model'=>$model,'proyectos'=>$proyectos)); ?>
		</div>
	</div>
</div>
