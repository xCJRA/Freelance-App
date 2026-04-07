<?php
/* @var $this TiemposController */
/* @var $data Tiempos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('proyecto_id')); ?>:</b>
	<?php echo CHtml::encode($data->proyecto_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tareas_id')); ?>:</b>
	<?php echo CHtml::encode($data->tareas_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</b>
	<?php echo CHtml::encode($data->tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('horas')); ?>:</b>
	<?php echo CHtml::encode($data->horas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('facturable')); ?>:</b>
	<?php echo CHtml::encode($data->facturable); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	*/ ?>

</div>