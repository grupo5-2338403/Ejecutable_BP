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
    <form action="../models/model_create_configuration_categories.php" method="POST" class="formulario">
        <!-- contenedor nombre -->
        <label for="nombre_persona">Categorias</label>
        <div class="a1">
            <input type="text" name="nombre_categorias" required>
            <input type="submit" value="Crear" name="crear" class="boton boton_selec" >
        </div>
        <div class="a1">
            <label for="">Creados</label>
            <div>
                <?php require "../conectar_BD_2.php";
                    $info = $database -> query("SELECT * FROM categorias")->fetchAll(PDO::FETCH_OBJ);
                    foreach ($info as $product):
                ?>
                <input type="text" name="" class="creados" value="<?php echo $product -> nombre_categorias?>" readonly>

                <a href="./view_update_configuration_categories.php?id_categorias=<?php echo $product -> id_categorias?> & nombre_categorias=<?php echo $product->nombre_categorias?>" class="boton_cancelar boton_selec">Editar</a>
                <a href="../models/model_delete_configuration_categories.php?id_categorias=<?php echo $product -> id_categorias ?>" class="boton_cancelar boton_selec">Borrar</a>
                 
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