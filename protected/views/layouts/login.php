<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css">
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.bundle.min.js"></script>
</head>
<body class="login-body">

    <div class="login-wrapper">

        <!-- Aquí Yii inyecta el contenido de la vista (site/login.php) -->
        <?php echo $content; ?>

    </div>

</body>
</html>