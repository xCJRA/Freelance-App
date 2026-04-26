<?php
Yii::app()->clientScript->registerScript('search', '
    //Funciones para tabs
    $(\'button[data-bs-toggle="tab"]\').on("shown.bs.tab", function (e) {
        if (e.target.id === "pest2") {
            $.fn.yiiGridView.update("tiempos-grid");
        }
    });
');
?>