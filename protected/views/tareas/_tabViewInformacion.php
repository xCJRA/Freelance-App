<!--HEADER-->  
<div class="card-body d-flex justify-content-between align-items-center">
    <h4 class="card-title mb-0">Tarea #<?php echo $model->id; ?></h4>
    <div class="card-tools">
        <div class="dropdown">
            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-card-list"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li> <?php echo CHtml::link('<i class="bi bi-table me-2"></i>Administrar tareas', array('tareas/admin', 'proyecto_id'=>$model->proyecto_id), array('class'=>'dropdown-item')); ?> </li>
                <li> <?php echo CHtml::link('<i class="bi bi-plus-lg me-2"></i>Crear tarea', array('tareas/create','proyecto_id'=>$model->proyecto_id), array('class'=>'dropdown-item')); ?> </li>
                <li> <?php echo CHtml::link('<i class="bi bi-pen me-2"></i>Editar tarea', array('tareas/update','id'=>$model->id), array('class'=>'dropdown-item')); ?> </li>
            </ul>
        </div>
    </div>
</div>
<!--PROPUESTA 2 COLUMNAS PARA LA INFORMACIÓN -->
<div class="row">
    <div class="col-6">
        <?php $this->widget('zii.widgets.CDetailView', array(
            'data'=>$model,
            'attributes'=>array(
                'id',
                array(
                    'name'  => 'proyecto_id',
                    'label' => 'Proyecto',
                    'type'  => 'raw',
                    'value' => Utilerias::getLink($model->proyecto_id, 'Proyectos', 'proyectos'),
                ),
                'nombre',
                'descripcion',
                'horas_estimadas',
                array(
                    'name'  => 'estado',
                    'label' => 'Estado',
                    'type'  => 'raw',
                    'value' => Utilerias::getCatalogoCampo('c_statusTarea', false, $model->estado),
                ),
            ),
        )); ?>
    </div>
    <div class="col-6">
        <?php $this->widget('zii.widgets.CDetailView', array(
            'data'=>$model,
            'attributes'=>array(
                'fecha_inicio',
                'fecha_fin',
                'horas_estimadas',
                'horas_reales',
                'comentarios',
            ),
        )); ?>
    </div>
</div>