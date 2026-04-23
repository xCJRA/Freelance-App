<!--HEADER-->  
<div class="card-body d-flex justify-content-between align-items-center">
    <h4 class="card-title mb-0">Listado de tareas</h4>
    <div class="card-tools">
        <div class="dropdown">
            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-card-list"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li> <?php echo CHtml::link('<i class="bi bi-file-earmark-plus me-2"></i>Crear proyecto', array('proyectos/create','cliente_id'=>$proyectos->cliente_id), array('class'=>'dropdown-item','target'=>'_blank')); ?> </li>
            </ul>
        </div>
    </div>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'proyectos-grid',
    'dataProvider'=>$proyectos->search(),
    'columns'=>array(
        'id',
        array(
            'name'   => 'cliente_id',
            'type'   => 'raw',
            'value'  => 'Utilerias::getLink($data->cliente_id, "Clientes", "clientes")',
        ),
        'nombre',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        array(
            'name'   => 'estado',
            'type'   => 'text',
            'value'  => 'Utilerias::getCatalogoCampo("c_statusProyecto",false,$data->estado)',
        ),
        array(
            'class'=>'ButtonColumn',
            'controlador'=>'proyectos',
        ),
    ),
)); ?>