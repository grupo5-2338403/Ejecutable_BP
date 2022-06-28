<?php require_once("../permissions/manager.php")?>
<!DOCTYPE html>
<!-- language -->
<?php include_once "../static/language.php" ?>
<head>
    <?php include_once "../static/heads/head_secondary_page.php" ?>
    <link rel="stylesheet" href="../static/styles/styles_all_settings.css">
</head>
<!-- header secondary page -->
<?php include_once "../static/headers/headers_secondary_page.php" ?>
<body id="body">
    <!-- inicio del formulario -->
    <form action="../models/model_create_configuration_role.php" method="POST" class="formulario">
        <!-- contenedor nombre -->
        <label for="nombre_persona">Rol</label>
        <div class="a1">
            <input type="text" name="nombre_rol" required>
            <input type="submit" value="Crear" name="crear" class="boton boton_selec" >
        </div>
        <div class="a1">
            <label for="">Creados</label>
            <div>
                <?php require "../conectar_BD_2.php";
                    $info = $database -> query("SELECT * FROM rol")->fetchAll(PDO::FETCH_OBJ);
                    foreach ($info as $product):
                ?>
                <input type="text" name="" class="creados" value="<?php echo $product -> nombre_rol?>" readonly>

                <a href="./view_update_configuration_role.php?id_rol=<?php echo $product -> id_rol?> & nombre_rol=<?php echo $product->nombre_rol?>" class="boton_cancelar boton_selec">Editar</a>
                <a href="../models/model_delete_configuration_role.php?id_rol=<?php echo $product -> id_rol ?>" class="boton_cancelar boton_selec">Borrar</a>
                 
                <?php endforeach;?>
            </div>
        </div>
 
        
        <div class="contenedor_cancelar">
            <a href="./view_configuration.php" class="boton_cancelar boton_selec">Volver</a>
        </div>
    </form>
</body>
</html>

 <!-- --> 