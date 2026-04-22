<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array('Login');
?>

<div class="min-vh-100 d-flex align-items-center justify-content-center bg-body-tertiary">
  <div class="card shadow-sm border-0 rounded-3" style="width: 100%; max-width: 400px;">
    <div class="card-body p-4 p-md-5">

      <!-- Cabecera -->
      <h1 class="h4 fw-semibold mb-1">Iniciar sesión</h1>
      <p class="text-body-secondary small mb-4">Ingresa tus credenciales para continuar.</p>

      <?php $form = $this->beginWidget('CActiveForm', array(
        'id'                     => 'login-form',
        'enableClientValidation' => true,
        'clientOptions'          => array('validateOnSubmit' => true),
      )); ?>

        <!-- Username -->
        <div class="mb-3">
          <?php echo $form->labelEx($model, 'username', array(
            'class' => 'form-label fw-medium small',
          )); ?>
          <?php echo $form->textField($model, 'username', array(
            'class'        => 'form-control',
            'placeholder'  => 'Tu usuario',
            'autocomplete' => 'username',
          )); ?>
          <?php echo $form->error($model, 'username', array(
            'class' => 'text-danger small mt-1',
          )); ?>
        </div>

        <!-- Password -->
        <div class="mb-2">
          <?php echo $form->labelEx($model, 'password', array(
            'class' => 'form-label fw-medium small',
          )); ?>
          <?php echo $form->passwordField($model, 'password', array(
            'class'        => 'form-control',
            'placeholder'  => '••••••••',
            'autocomplete' => 'current-password',
          )); ?>
          <?php echo $form->error($model, 'password', array(
            'class' => 'text-danger small mt-1',
          )); ?>
        </div>

        <!-- Hint -->
        <p class="text-body-secondary small mb-3">
          Prueba con <kbd>demo</kbd>/<kbd>demo</kbd> o <kbd>admin</kbd>/<kbd>admin</kbd>.
        </p>

        <!-- Remember me -->
        <div class="form-check mb-4">
          <?php echo $form->checkBox($model, 'rememberMe', array(
            'class' => 'form-check-input',
          )); ?>
          <?php echo $form->label($model, 'rememberMe', array(
            'class' => 'form-check-label small text-body-secondary',
          )); ?>
          <?php echo $form->error($model, 'rememberMe', array(
            'class' => 'text-danger small mt-1',
          )); ?>
        </div>

        <!-- Submit -->
        <?php echo CHtml::submitButton('Iniciar sesión', array(
          'class' => 'btn btn-dark w-100',
        )); ?>

      <?php $this->endWidget(); ?>

    </div>
  </div>
</div>