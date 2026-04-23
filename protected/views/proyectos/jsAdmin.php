<?php
Yii::app()->clientScript->registerScript('search', "
    $('#btnBuscar').click(function(){
        $.fn.yiiGridView.update('proyectos-grid', {
            data: $('#form-proyectos').serialize()
        });
    });
");