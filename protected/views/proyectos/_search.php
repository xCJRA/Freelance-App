<?php $form=$this->beginWidget('CActiveForm', array(
    'id'    =>'form-proyectos',
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<?php echo $form->hiddenField($model, 'cliente_id'); ?>
<!-- FORM -->
<div class="card-body">
    <div class="row">

		<div class="col-md-6 col-lg-4 pb-2">
            <div class="form-group row">
                <?php echo $form->label($model, 'cliente_id', array('class' => 'control-label col-sm-4')); ?>
                <div class="col-md-6">
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
                </div>
            </div>
        </div>

		<div class="col-md-6 col-lg-4">
            <div class="form-group row">
                <?php echo $form->label($model, 'nombre', array('class' => 'control-label col-sm-4')); ?>
                <div class="col-md-6">
                    <?php echo $form->textField($model, 'nombre', array('class' => 'form-control form-control-sm')); ?>
                </div>
            </div>
        </div>

		<div class="col-md-6 col-lg-4">
            <div class="form-group row">
                <?php echo $form->label($model, 'fecha_inicio', array('class' => 'control-label col-sm-4')); ?>
                <div class="col-md-6">
                    <?php echo $form->textField($model, 'fecha_inicio', array('class' => 'form-control form-control-sm')); ?>
                </div>
            </div>
        </div>

		<div class="col-md-6 col-lg-4">
            <div class="form-group row">
                <?php echo $form->label($model, 'fecha_fin', array('class' => 'control-label col-sm-4')); ?>
                <div class="col-md-6">
                    <?php echo $form->textField($model, 'fecha_fin', array('class' => 'form-control form-control-sm')); ?>
                </div>
            </div>
        </div>

		<div class="col-md-6 col-lg-4">
            <div class="form-group row">
                <?php echo $form->label($model, 'estado', array('class' => 'control-label col-sm-4')); ?>
                <div class="col-md-6">
                    <?php echo $form->dropDownList($model, 'estado', Utilerias::getCatalogo('c_statusProyecto'),array('class' => 'form-control form-control-sm')); ?>
                </div>
            </div>
        </div>


	</div>
</div>
<!-- BUTTON -->
<div class="card-footer clearfix" style="display: block;">
	<div class="col text-center">
		<?php echo CHtml::Button('Buscar', array('id'=>'btnBuscar','class' => "btn btn-". Yii::app()->params["color"])); ?>
	</div>
</div>
<?php $this->endWidget(); ?>