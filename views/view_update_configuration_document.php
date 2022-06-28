<!DOCTYPE html>
<!-- language -->
<?php include_once "../static/language.php" ?>
<head>
    <?php include_once ("../models/model_update_configuration_document.php") ?>
    <?php include_once "../static/heads/head_secondary_page.php" ?>
    <link rel="stylesheet" href="../static/styles/styles_update_all_settings.css">
    <?php require_once("../permissions/manager.php")?>
</head>
<!-- header secondary page -->
<?php include_once "../static/headers/headers_secondary_page.php" ?>

<body id="body">
    <!-- inicio del formulario -->
    <form action="../models/model_update_configuration_document.php" method="POST" class="formulario"
        <!-- contenedor nombre -->
        <label for="">Tipos de documentos</label>
        <div class="a1">
            <div class="desaparecer">
                <input type="text" name="id_tipo" value="<?php echo $id_tipo ?>">   
            </div>
            <input type="text" name="nombre_tipo" value="<?php echo  $nombre_tipo ?>">
            <input type="submit" value="Guardar" name="guardar" class="boton boton_selec">
        </div>
        <div class="contenedor_cancelar">
            <a href="./view_configuration_document.php" class="boton_cancelar boton_selec">Volver</a>
        </div>
    </form>
</body>
</html>

 <!-- --> 