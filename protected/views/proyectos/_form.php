<?php
/* @var $this ProyectosController */
/* @var $model Proyectos */
/* @var $form CActiveForm */
?>

<div class="container-sm py-4">

  <h1 class="h4 fw-semibold mb-1">
    <?php echo $model->isNewRecord ? 'Nuevo Proyecto' : 'Editar Proyecto'; ?>
  </h1>
  <p class="text-body-secondary small mb-4">
    Los campos con <span class="text-danger">*</span> son obligatorios.
  </p>

  <?php $form = $this->beginWidget('CActiveForm', array(
    'id'                   => 'proyectos-form',
    'enableAjaxValidation' => false,
  )); ?>

    <?php echo $form->hiddenField($model, 'cliente_id'); ?>

    <!-- Error summary -->
    <?php echo $form->errorSummary($model, null, null, array(
      'class' => 'alert alert-danger small',
    )); ?>
	<div class="row">
		<!-- Cliente (Autocomplete) -->
		<div class="col-sm-12 col-md-6 col-lg-4 mb-3">
			<?php echo $form->labelEx($model, 'cliente_id', array('class' => 'form-label fw-medium small')); ?>
			<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
				'model'     => $model,
				'attribute' => 'nombreCliente',
				'sourceUrl' => array('clientes/listar'),
				'options'   => array(
				'minLength' => 2,
				'select'    => 'js:function(event, ui) {
					$("#Proyectos_cliente_id").val(ui.item.id);
					$(this).val(ui.item.value);
					return false;
				}',
				'focus'     => 'js:function(event, ui) {
					$("#Proyectos_cliente_id").val(ui.item.label);
					$(this).val(ui.item.value);
					return false;
				}',
				),
				'htmlOptions' => array(
				'class'       => 'form-control',
				'placeholder' => 'Buscar cliente por nombre...',
				'autocomplete'=> 'off',
				),
			)); ?>
			<?php echo $form->error($model, 'cliente_id', array('class' => 'text-danger small mt-1')); ?>
		</div>

		<!-- Nombre -->
		<div class="col-sm-12 col-md-6 col-lg-4 mb-3">
			<?php echo $form->labelEx($model, 'nombre', array('class' => 'form-label fw-medium small')); ?>
			<?php echo $form->textField($model, 'nombre', array(
				'class'     => 'form-control',
				'maxlength' => 40,
			)); ?>
			<?php echo $form->error($model, 'nombre', array('class' => 'text-danger small mt-1')); ?>
		</div>

		<!-- Descripción -->
		<div class="col-sm-12 col-md-6 col-lg-4 mb-3">
			<?php echo $form->labelEx($model, 'descripcion', array('class' => 'form-label fw-medium small')); ?>
			<?php echo $form->textArea($model, 'descripcion', array(
				'class' => 'form-control',
				'rows'  => 2,
			)); ?>
			<?php echo $form->error($model, 'descripcion', array('class' => 'text-danger small mt-1')); ?>
		</div>

		<div class="col-sm-12 col-md-6 col-lg-4 mb-3">
			<?php echo $form->labelEx($model, 'fecha_inicio', array('class' => 'form-label fw-medium small')); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model'     => $model,
			'attribute' => 'fecha_inicio',
			'options'   => array(
				'showAnim'    => 'fold',
				'dateFormat'  => 'yy-mm-dd',
				'changeMonth' => true,
				'changeYear'  => true,
			),
			'htmlOptions' => array(
				'class'     => 'form-control',
				'maxlength' => 10,
			),
			)); ?>
			<?php echo $form->error($model, 'fecha_inicio', array('class' => 'text-danger small mt-1')); ?>
		</div>

		<div class="col-sm-12 col-md-6 col-lg-4 mb-3">
			<?php echo $form->labelEx($model, 'fecha_fin', array('class' => 'form-label fw-medium small')); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model'     => $model,
			'attribute' => 'fecha_fin',
			'options'   => array(
				'showAnim'    => 'fold',
				'dateFormat'  => 'yy-mm-dd',
				'changeMonth' => true,
				'changeYear'  => true,
			),
			'htmlOptions' => array(
				'class'     => 'form-control',
				'maxlength' => 10,
			),
			)); ?>
			<?php echo $form->error($model, 'fecha_fin', array('class' => 'text-danger small mt-1')); ?>
		</div>

		<div class="col-sm-12 col-md-6 col-lg-4 mb-3">
			<?php echo $form->labelEx($model, 'tarifa_base', array('class' => 'form-label fw-medium small')); ?>
			<?php echo $form->textField($model, 'tarifa_base', array(
			'class'     => 'form-control',
			'maxlength' => 10,
			)); ?>
			<?php echo $form->error($model, 'tarifa_base', array('class' => 'text-danger small mt-1')); ?>
		</div>

		<div class="col-sm-12 col-md-6 col-lg-4 mb-3">
			<?php echo $form->labelEx($model, 'estado', array('class' => 'form-label fw-medium small')); ?>
			<?php echo $form->dropDownList($model, 'estado', Utilerias::getCatalogo('c_statusProyecto'), array(
			'class' => 'form-select',
			)); ?>
			<?php echo $form->error($model, 'estado', array('class' => 'text-danger small mt-1')); ?>
		</div>
	</div>
    <!-- Botón -->
    <?php echo CHtml::submitButton(
      $model->isNewRecord ? 'Crear proyecto' : 'Guardar cambios',
      array('class' => 'btn px-4 btn-' . Yii::app()->params['color'])
    ); ?>

  <?php $this->endWidget(); ?>

</div>