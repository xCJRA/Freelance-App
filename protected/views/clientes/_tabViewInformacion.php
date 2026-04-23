<!--HEADER-->  
<div class="card-body d-flex justify-content-between align-items-center">
    <h4 class="card-title mb-0">Cliente #<?php echo $model->id; ?></h4>
    <div class="card-tools">
        <div class="dropdown">
            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-card-list"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li> <?php echo CHtml::link('<i class="bi bi-table me-2"></i>Administrar clientes', array('clientes/admin'), array('class'=>'dropdown-item')); ?> </li>
                <li> <?php echo CHtml::link('<i class="bi bi-pen me-2"></i>Editar cliente', array('clientes/update','id'=>$model->id), array('class'=>'dropdown-item')); ?> </li>
                <li> <?php echo CHtml::link('<i class="bi bi-file-earmark-plus me-2"></i>Crear proyecto', array('proyectos/create','cliente_id'=>$model->id), array('class'=>'dropdown-item')); ?> </li>
            </ul>
        </div>
    </div>
</div>
<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$model,
    'attributes'=>array(
        'id',
        'nombre',
        'email',
        'telefono',
        'rs',
        'notas',
        'estado',
    ),
)); ?>