<!--HEADER-->  
<div class="card-body d-flex justify-content-between align-items-center">
    <h4 class="card-title mb-0">Listado de tareas</h4>
    <div class="card-tools">
        <div class="dropdown">
            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-card-list"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li> <?php echo CHtml::link('<i class="bi bi-file-earmark-plus me-2"></i>Crear tarea', array('tareas/create','proyecto_id'=>$tareas->proyecto_id), array('class'=>'dropdown-item','target'=>'_blank')); ?> </li>
            </ul>
        </div>
    </div>
</div>
<?php
        $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'tareas-grid',
		'dataProvider'=>$tareas->search(),
		'columns'=>array(
			array(
				'name'   => 'proyecto_id',
				'type'   => 'raw',
				'value'  => 'Utilerias::getLink($data->proyecto_id, "Proyectos", "proyectos")',
			),
			'nombre',
			'descripcion',
			'horas_estimadas',
			array(
				'name'   => 'estado',
				'type'   => 'raw',
				'value'  => 'Utilerias::getCatalogoCampo("c_statusTarea", false, $data->estado)',
			),
			array(
				'class'=>'ButtonColumn',
                'controlador'=>'tareas',
			),
		),
	)); 
?>
</div>