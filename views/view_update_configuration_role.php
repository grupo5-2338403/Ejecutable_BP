<?php require_once("../permissions/manager.php")?>
<!DOCTYPE html>
<!-- language -->
<?php include_once "../static/language.php" ?>
<head>
    <?php include_once ("../models/model_update_configuration_role.php") ?>
    <?php include_once "../static/heads/head_secondary_page.php" ?>
    <link rel="stylesheet" href="../static/styles/styles_update_all_settings.css">
</head>
<!-- header secondary page -->
<?php include_once "../static/headers/headers_secondary_page.php" ?>
<body id="body">
    <!-- inicio del formulario -->
    <form action="../models/model_update_configuration_role.php" method="POST" class="formulario">
        <!-- contenedor nombre -->
        <label for="">Rol</label>
        <div class="a1">
            <div class="desaparecer">
                <input type="text" name="id_rol" value="<?php echo $id_rol ?>">   
            </div>
            <input type="text" name="nombre_rol" value="<?php echo  $nombre_rol ?>">
            <input type="submit" value="Guardar" name="guardar" class="boton boton_selec">
        </div>
        <div class="contenedor_cancelar">
            <a href="./view_configuration_role.php" class="boton_cancelar boton_selec">Volver</a>
        </div>
    </form>
</body>
</html>

 <!-- --> 