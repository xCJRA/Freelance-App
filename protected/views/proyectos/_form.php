<div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'proyectos-form',
		'enableAjaxValidation'=>false,
	)); ?>
	<?php echo $form->hiddenField($model, 'cliente_id'); ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo $form->labelEx($model, 'cliente_id'); ?>
		<?php
			$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
				'model'       => $model,
				'attribute'   => 'nombreCliente',        // campo del modelo
				'sourceUrl'   => array('clientes/listar'),
				'options'     => array(
					'minLength' => 2,
					'select'    => 'js:function(event, ui) {
						// aquí el value del campo pasa a ser el id
						$("#Proyectos_cliente_id").val(ui.item.id);
						$(this).val(ui.item.value);
						return false;
					}',
					'focus'     => 'js:function(event, ui) {
						// para que se vea el nombre, no el ID
						$("#Proyectos_cliente_id").val(ui.item.label);
						$(this).val(ui.item.value);
						return false;
					}',
				),
				'htmlOptions' => array(
					'size' => 30,
					'placeholder' => 'Buscar cliente por nombre...',
				),
			));
		?>
		<?php echo $form->error($model, 'cliente_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textArea($model,'descripcion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'fecha_inicio'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model'=>$model,
			'attribute'=>'fecha_inicio',
			'options'=>array(
				'showAnim'=>'fold',
				'dateFormat'=>'yy-mm-dd',
				'changeMonth' => true,
				'changeYear'  => true,
			),
			'htmlOptions'=>array(
				'size'=>10,
				'maxlength'=>10,
			),
		)); ?>
		<?php echo $form->error($model,'fecha_inicio'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'fecha_fin'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model'=>$model,
			'attribute'=>'fecha_fin',
			'options'=>array(
				'showAnim'=>'fold',
				'dateFormat'=>'yy-mm-dd',
				'changeMonth' => true,
				'changeYear'  => true,
			),
			'htmlOptions'=>array(
				'size'=>10,
				'maxlength'=>10,
			),
		)); ?>
		<?php echo $form->error($model,'fecha_fin'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'tarifa_base'); ?>
		<?php echo $form->textField($model,'tarifa_base',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'tarifa_base'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'estado'); ?>
		<?php echo $form->dropDownList($model,'estado',Utilerias::getCatalogo('c_statusProyecto'),array()); ?>
		<?php echo $form->error($model,'estado'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->