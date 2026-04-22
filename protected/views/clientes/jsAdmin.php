<?php
Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
    });
    $('.search-form form').submit(function(){
        $('#clientes-grid').yiiGridView('update', {
            data: $(this).serialize()
        });
        return false;
    });

    $('#btnPrueba').click(function(){
        Swal.fire(
            'asdas'
        );
    });
");