<!--HEADER-->  
<div class="card-body d-flex justify-content-between align-items-center">
    <h4 class="card-title mb-0">Listado de tiempos </h4>
    <div class="card-tools">
        <div class="dropdown">
            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-card-list"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li> <?php echo CHtml::link('<i class="bi bi-table me-2"></i>Administrar tiempos', array('tiempos/admin', 'proyecto_id'=>$model->proyecto_id, 'tareas_id'=>$model->id), array('class'=>'dropdown-item')); ?> </li>
                <li> <?php echo CHtml::link('<i class="bi bi-plus-lg me-2"></i>Crear tiempo', array('tiempos/create', 'proyecto_id'=>$model->proyecto_id,'tareas_id'=>$model->id), array('class'=>'dropdown-item')); ?> </li>
            </ul>
        </div>
    </div>
</div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tiempos-grid',
	'dataProvider'=>$tiempos->search(),
	'columns'=>array(
        array(
            'name'   => 'proyecto_id',
            'type'   => 'raw',
            'value'  => 'Utilerias::getLink($data->proyecto_id, "Proyectos", "proyectos")',
        ),
        array(
            'name'   => 'tareas_id',
            'type'   => 'raw',
            'value'  => 'Utilerias::getLink($data->tareas_id, "Tareas", "Tareas")',
        ),
        array(
            'name'   => 'tipo',
            'type'   => 'raw',
            'value'  => 'Utilerias::getCatalogoCampo("c_tiempoTipo",false,$data->tipo)',
        ),
		'descripcion',
		'horas',
        array(
            'name'   => 'facturable',
            'type'   => 'raw',
            'value'  => 'Utilerias::getCatalogoCampo("c_tiempoFacturable",false,$data->facturable)',
        ),
		'fecha',
		array(
			'class'=>'ButtonColumn',
            'controlador'=>'tiempos'
		),
	),
)); ?>