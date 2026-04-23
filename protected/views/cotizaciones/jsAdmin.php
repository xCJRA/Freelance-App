<?php

Yii::app()->clientScript->registerScript('search', "
    $('#btnBuscar').click(function(){
        $.fn.yiiGridView.update('cotizaciones-grid', {
            data: $('#form-cotizaciones').serialize()
        });
    });
");