<?php
/* @var $this CotizacionesController */
/* @var $model Cotizaciones */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cotizaciones-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cliente_id'); ?>
		<?php echo $form->textField($model,'cliente_id'); ?>
		<?php echo $form->error($model,'cliente_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'proyecto_nombre'); ?>
		<?php echo $form->textField($model,'proyecto_nombre',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'proyecto_nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_estimado'); ?>
		<?php echo $form->textField($model,'total_estimado',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'total_estimado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'buffer_porcentaje'); ?>
		<?php echo $form->textField($model,'buffer_porcentaje',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'buffer_porcentaje'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_final'); ?>
		<?php echo $form->textField($model,'total_final',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'total_final'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estado'); ?>
		<?php echo $form->textField($model,'estado',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'estado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_at'); ?>
		<?php echo $form->textField($model,'created_at'); ?>
		<?php echo $form->error($model,'created_at'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->