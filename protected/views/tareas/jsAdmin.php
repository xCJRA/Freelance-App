<?php
    Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
    });
    $('.search-form form').submit(function(){
        $('#tareas-grid').yiiGridView('update', {
            data: $(this).serialize()
        });
        return false;
    });
    ");