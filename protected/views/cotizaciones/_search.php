<?php $form=$this->beginWidget('CActiveForm', array(
    'id'    =>'form-cotizaciones',
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>


<?php echo $form->hiddenField($model, 'cliente_id'); ?>
<!-- FORM -->
<div class="card-body">
    <div class="row">
		<div class="col-md-6 col-lg-4 pb-2">
            <div class="form-group row">
                <?php echo $form->label($model, 'nombre', array('class' => 'control-label col-sm-4')); ?>
                <div class="col-md-6">
                    <?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                        'model'     => $model,
                        'attribute' => 'nombreCliente',
                        'sourceUrl' => array('clientes/listar'),
                        'options'   => array(
                        'minLength' => 2,
                        'select'    => 'js:function(event, ui) {
                            $("#Clientes_id").val(ui.item.id);
                            $(this).val(ui.item.value);
                            return false;
                        }',
                        'focus'     => 'js:function(event, ui) {
                            $("#Clientes_id").val(ui.item.label);
                            $(this).val(ui.item.value);
                            return false;
                        }',
                        ),
                        'htmlOptions' => array(
                        'class'       => 'form-control form-control-sm',
                        'placeholder' => 'Buscar cliente por nombre...',
                        'autocomplete'=> 'off',
                        ),
                    )); ?>
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