<?php
Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
    });
    $('.search-form form').submit(function(){
        $('#proyectos-grid').yiiGridView('update', {
            data: $(this).serialize()
        });
        return false;
    });
");