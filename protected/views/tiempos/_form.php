<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tiempos-form',
	'enableAjaxValidation'=>false,
)); ?>
<div class="container-sm py-4">
	<h1 class="h4 fw-semibold mb-1">
		<?php echo $model->isNewRecord ? 'Nueva Tarea' : 'Editar Tarea'; ?>
	</h1>
	<p class="text-body-secondary small mb-4">
		Los campos con <span class="text-danger">*</span> son obligatorios.
	</p>
	<!-- Error summary -->
	<?php echo $form->errorSummary($model, null, null, array(
		'class' => 'alert alert-danger small',
	)); ?>
	<?php echo $form->hiddenField($model,'proyecto_id'); ?>
	<?php echo $form->hiddenField($model,'tareas_id'); ?>

	<div class="row">		

		<div class="col-sm-12 col-md-6 col-lg-4 mb-3">
			<?php echo $form->labelEx($model,'proyecto_id', array('class' => 'form-label fw-medium small')); ?>
			<?php echo $form->textField($model,'proyecto_nombre',array('class' => 'form-control','readonly'=>'readonly')); ?>
			<?php echo $form->error($model,'proyecto_id', array('class' => 'text-danger small mt-1')); ?>
		</div>
		
		<div class="col-sm-12 col-md-6 col-lg-4 mb-3">
			<?php echo $form->labelEx($model,'tareas_id', array('class' => 'form-label fw-medium small')); ?>
			<?php echo $form->textField($model,'tarea_nombre',array('class' => 'form-control','readonly'=>'readonly')); ?>
			<?php echo $form->error($model,'tareas_id', array('class' => 'text-danger small mt-1')); ?>
		</div>
		
		<div class="col-sm-12 col-md-6 col-lg-4 mb-3">
			<?php echo $form->labelEx($model,'tipo', array('class' => 'form-label fw-medium small')); ?>
			<?php echo $form->dropDownList($model,'tipo',Utilerias::getCatalogo('c_tiempoTipo'),array('class' => 'form-select')); ?>
			<?php echo $form->error($model,'tipo', array('class' => 'text-danger small mt-1')); ?>
		</div>
		
		<div class="col-sm-12 col-md-6 col-lg-4 mb-3">
			<?php echo $form->labelEx($model,'horas', array('class' => 'form-label fw-medium small')); ?>
			<?php echo $form->textField($model,'horas',array('class' => 'form-control','size'=>10,'maxlength'=>10)); ?>
			<?php echo $form->error($model,'horas', array('class' => 'text-danger small mt-1')); ?>
		</div>
		
		<div class="col-sm-12 col-md-6 col-lg-4 mb-3">
			<?php echo $form->labelEx($model,'facturable', array('class' => 'form-label fw-medium small')); ?>
			<?php echo $form->dropDownList($model,'facturable',Utilerias::getCatalogo('c_tiempoFacturable'),array('class' => 'form-select')); ?>
			<?php echo $form->error($model,'facturable', array('class' => 'text-danger small mt-1')); ?>
		</div>
		
		<div class="col-sm-12 col-md-6 col-lg-4 mb-3">
			<?php echo $form->labelEx($model,'fecha', array('class' => 'form-label fw-medium small')); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model'     => $model,
				'attribute' => 'fecha',
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
			<?php echo $form->error($model,'fecha', array('class' => 'text-danger small mt-1')); ?>
		</div>
		
		<div class="col-sm-12 col-md-6 col-lg-4 mb-3">
			<?php echo $form->labelEx($model,'descripcion', array('class' => 'form-label fw-medium small')); ?>
			<?php echo $form->textArea($model,'descripcion',array('class' => 'form-control','rows'=>2)); ?>
			<?php echo $form->error($model,'descripcion', array('class' => 'text-danger small mt-1')); ?>
		</div>
	</div>
	<!-- Botón -->
	<?php echo CHtml::submitButton(
		$model->isNewRecord ? 'Crear tarea' : 'Guardar cambios',
		array('class' => 'btn px-4 btn-' . Yii::app()->params['color'])
	); ?>
</div>
<?php $this->endWidget(); ?>