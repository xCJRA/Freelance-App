<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<!-- FORM -->
<div class="card-body">
    <div class="row">

		<div class="col-md-6 col-lg-4 pb-2">
            <div class="form-group row">
                <?php echo $form->label($model, 'nombre', array('class' => 'control-label col-sm-4')); ?>
                <div class="col-md-6">
                    <?php echo $form->textField($model, 'nombre', array('class' => 'form-control form-control-sm')); ?>
                </div>
            </div>
        </div>

		<div class="col-md-6 col-lg-4">
            <div class="form-group row">
                <?php echo $form->label($model, 'email', array('class' => 'control-label col-sm-4')); ?>
                <div class="col-md-6">
                    <?php echo $form->textField($model, 'email', array('class' => 'form-control form-control-sm')); ?>
                </div>
            </div>
        </div>

		<div class="col-md-6 col-lg-4">
            <div class="form-group row">
                <?php echo $form->label($model, 'telefono', array('class' => 'control-label col-sm-4')); ?>
                <div class="col-md-6">
                    <?php echo $form->textField($model, 'telefono', array('class' => 'form-control form-control-sm')); ?>
                </div>
            </div>
        </div>

		<div class="col-md-6 col-lg-4">
            <div class="form-group row">
                <?php echo $form->label($model, 'rs', array('class' => 'control-label col-sm-4')); ?>
                <div class="col-md-6">
                    <?php echo $form->textField($model, 'rs', array('class' => 'form-control form-control-sm')); ?>
                </div>
            </div>
        </div>

	</div>
</div>
<!-- BUTTON -->
<div class="card-footer clearfix" style="display: block;">
	<div class="col text-center">
		<?php echo CHtml::submitButton('Buscar', array('class' => "btn btn-". Yii::app()->params["color"])); ?>
	</div>
</div>
<?php $this->endWidget(); ?>