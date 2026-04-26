<!--HEADER-->  
<div class="card-body d-flex justify-content-between align-items-center">
    <h4 class="card-title mb-0">Proyecto #<?php echo $model->id; ?></h4>
    <div class="card-tools">
        <div class="dropdown">
            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-card-list"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li> <?php echo CHtml::link('<i class="bi bi-table me-2"></i>Administrar proyectos', array('proyectos/admin','cliente_id'=>$model->cliente_id), array('class'=>'dropdown-item')); ?> </li>
                <li> <?php echo CHtml::link('<i class="bi bi-pen me-2"></i>Editar proyecto', array('proyectos/update','id'=>$model->id), array('class'=>'dropdown-item')); ?> </li>
            </ul>
        </div>
    </div>
</div>
<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$model,
    'attributes'=>array(
        'id',
        array(
            'name'  => 'cliente_id',
            'label' => 'Cliente',
            'type'  => 'raw',
            'value' => Utilerias::getLink($model->cliente_id, 'Clientes', 'clientes'),
        ),
        'nombre',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        array(
            'name'  => 'estado',
            'label' => 'Estado',
            'type'  => 'raw',
            'value' => Utilerias::getCatalogoCampo('c_statusProyecto',false,$model->estado),
        ),
        array(
            'name' => 'tarifa_base',
            'label' => 'Tarifa base',
            'type'  => 'raw',
            'value' => Utilerias::getFormatoMoneda($model->tarifa_base),
        ),
        array(
            'name'  => 'gananciaEstimada',
            'label' => 'Ganancia estimada',
            'type'  => 'raw',
            'value' => $model->getGanancia('horas_estimadas'),
        ),
        array(
            'name'  => 'gananciaReal',
            'label' => 'Ganancia real',
            'type'  => 'raw',
            'value' => $model->getGanancia('horas_reales'),
        ),
    ),
)); ?>