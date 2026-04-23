<?php 
  $form = $this->beginWidget('CActiveForm', array(
  'id'                  => 'clientes-form',
  'enableAjaxValidation' => false,
  ));
?>
<div class="container-sm py-4">

  <h1 class="h4 fw-semibold mb-1">
    <?php echo $model->isNewRecord ? 'Nuevo Cliente' : 'Editar Cliente'; ?>
  </h1>
  <p class="text-body-secondary small mb-4">
    Los campos con <span class="text-danger">*</span> son obligatorios.
  </p>

  <!-- Error summary -->
  <?php echo $form->errorSummary($model, null, null, array(
    'class' => 'alert alert-danger small',
  )); ?>

  <div class="row">
    <!-- Nombre -->
    <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
      <?php echo $form->labelEx($model, 'nombre', array('class' => 'form-label fw-medium small')); ?>
      <?php echo $form->textField($model, 'nombre', array(
        'class'     => 'form-control',
        'maxlength' => 30,
      )); ?>
      <?php echo $form->error($model, 'nombre', array('class' => 'text-danger small mt-1')); ?>
    </div>

    <!-- Email -->
    <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
      <?php echo $form->labelEx($model, 'email', array('class' => 'form-label fw-medium small')); ?>
      <?php echo $form->textField($model, 'email', array(
        'class'     => 'form-control',
        'maxlength' => 100,
      )); ?>
      <?php echo $form->error($model, 'email', array('class' => 'text-danger small mt-1')); ?>
    </div>

    <!-- Teléfono -->
    <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
      <?php echo $form->labelEx($model, 'telefono', array('class' => 'form-label fw-medium small')); ?>
      <?php echo $form->textField($model, 'telefono', array(
        'class'     => 'form-control',
        'maxlength' => 15,
      )); ?>
      <?php echo $form->error($model, 'telefono', array('class' => 'text-danger small mt-1')); ?>
    </div>

    <!-- Razón Social -->
    <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
      <?php echo $form->labelEx($model, 'rs', array('class' => 'form-label fw-medium small')); ?>
      <?php echo $form->textField($model, 'rs', array(
        'class'     => 'form-control',
        'maxlength' => 40,
      )); ?>
      <?php echo $form->error($model, 'rs', array('class' => 'text-danger small mt-1')); ?>
    </div>

    <!-- Fecha registro (default - dia en curso ) -->
    <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
      <?php echo $form->labelEx($model, 'fe_registro', array('class' => 'form-label fw-medium small')); ?>
      <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'model'=>$model,
        'attribute'=>'fe_registro',
        'options'=>array(
          'showAnim'=>'fold',
          'dateFormat'=>'yy-mm-dd',
          'changeMonth' => true,
          'changeYear'  => true,
        ),
        'htmlOptions'=>array(
          'class'=>'form-control',
          'size'=>10,
          'maxlength'=>10,
        ),
      )); ?>
      <?php echo $form->error($model, 'fe_registro', array('class' => 'text-danger small mt-1')); ?>
    </div>

    <!-- Cobrar IVA -->
    <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
      <?php echo $form->labelEx($model, 'cobrarIva', array('class' => 'form-label fw-medium small')); ?>
      <?php echo $form->dropDownList($model, 'cobrarIva', Utilerias::getCatalogo('c_impuestoCli'), array(
        'class' => 'form-select',
      )); ?>
      <?php echo $form->error($model, 'cobrarIva', array('class' => 'text-danger small mt-1')); ?>
    </div>

    <!-- Notas -->
    <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
      <?php echo $form->labelEx($model, 'notas', array('class' => 'form-label fw-medium small')); ?>
      <?php echo $form->textArea($model, 'notas', array(
        'class' => 'form-control',
        'rows'  => 2,
      )); ?>
      <?php echo $form->error($model, 'notas', array('class' => 'text-danger small mt-1')); ?>
    </div>
  </div>
  <!-- Botón -->
  <?php echo CHtml::submitButton(
    $model->isNewRecord ? 'Crear cliente' : 'Guardar cambios',
    array('class' => 'btn px-4 btn-' . Yii::app()->params['color'])
  ); ?>

</div>

<?php $this->endWidget(); ?>