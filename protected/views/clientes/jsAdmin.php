<?php
Yii::app()->clientScript->registerScript('search', "
    $('#btnBuscar').click(function(){
        $.fn.yiiGridView.update('clientes-grid', {
            data: $('#form-clientes').serialize()
        });
    });
");