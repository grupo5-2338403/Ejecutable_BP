<?php require_once("../permissions/manager.php")?>
<!DOCTYPE html>
<!DOCTYPE html>
<!-- language -->
<?php include_once "../static/language.php" ?>
<?php require_once ("../models/model_update_configuration_brand.php") ?>
<head>
    <?php include_once "../static/heads/head_secondary_page.php" ?>
    <link rel="stylesheet" href="../static/styles/styles_update_all_settings.css">
</head>
<!-- header secondary page -->
<?php include_once "../static/headers/headers_secondary_page.php" ?>
<body id="body">
    <!-- inicio del formulario -->
    <form action="../models/model_update_configuration_brand.php" method="POST" class="formulario">
        <!-- contenedor nombre -->
        <label for="">Marca</label>
        <div class="a1">
            <div class="desaparecer">
                <input type="text" name="id_marca" value="<?php echo $id_marca ?>">   
            </div>
            <input type="text" name="nombre_marca" value="<?php echo  $nombre_marca ?>">
            <input type="submit" value="Guardar" name="guardar" class="boton boton_selec">
        </div>
        <div class="contenedor_cancelar">
            <a href="./view_configuration_brand.php" class="boton_cancelar boton_selec">Volver</a>
        </div>
    </form>
</body>
</html>

 <!-- --> 