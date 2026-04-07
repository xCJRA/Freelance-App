<?php
/* @var $this CotizacionesController */
/* @var $data Cotizaciones */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cliente_id')); ?>:</b>
	<?php echo CHtml::encode($data->cliente_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('proyecto_nombre')); ?>:</b>
	<?php echo CHtml::encode($data->proyecto_nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_estimado')); ?>:</b>
	<?php echo CHtml::encode($data->total_estimado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('buffer_porcentaje')); ?>:</b>
	<?php echo CHtml::encode($data->buffer_porcentaje); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_final')); ?>:</b>
	<?php echo CHtml::encode($data->total_final); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

	*/ ?>

</div>