<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<?php echo $form->hiddenField($model, 'proyecto_id'); ?>
<!-- FORM -->
<div class="card-body">
	<div class="col-md-6 col-lg-4 pb-2">
		<div class="form-group row">
			<?php echo $form->label($model, 'proyecto_id', array('class' => 'control-label col-sm-4')); ?>
			<div class="col-md-6">
				<?php
					$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
						'model'       => $model,
						'attribute'   => 'proyecto_nombre',        // campo del modelo
						'sourceUrl'   => array('tareas/listar'),
						'options'     => array(
							'minLength' => 2,
							'select'    => 'js:function(event, ui) {
								// aquí el value del campo pasa a ser el id
								$("#Tareas_proyecto_id").val(ui.item.id);
								$(this).val(ui.item.value);
								return false;
							}',
							'focus'     => 'js:function(event, ui) {
								// para que se vea el nombre, no el ID
								$("#Tareas_proyecto_id").val(ui.item.label);
								$(this).val(ui.item.value);
								return false;
							}',
						),
						'htmlOptions' => array(
							'size' => 30,
							'placeholder' => 'Buscar proyecto por nombre...',
						),
					));
				?>
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