
<!DOCTYPE html>
<!-- language -->
<?php include_once "../static/language.php" ?>
<head>
    <?php require_once ("../controllers/class_users.php"); ?>
    <?php include_once "../static/heads/head_secondary_page.php" ?>
    <link rel="stylesheet" href="../static/styles/styles_manage_users.css">

</head>
<!-- header secondary page -->
<?php include_once "../static/headers/headers_secondary_page.php" ?>


<body id="body">

    <section class="section">
        <?php require_once "../conectar_BD_2.php";
                $info = $database -> query("SELECT * FROM usuarios")->fetchAll(PDO::FETCH_OBJ);
                foreach ($info as $product):
        ?>
            <article class="article">
                <div>
                    <div class="contenedor_1">
                        <p>Nombre</p>
                        <p>Apellido</p>
                        <p>Tipo de documento</p>
                        <p>Numero de documento</p>
                        <p>Correo</p>
                    </div>
                    <div class="contenedor_1">
                        <input value="<?php echo $product->nombre_persona?>">
                        <input value="<?php echo $product->apellido_persona?>">
                        <input value="<?php echo Usuario::traer_nombre($product->tipo_de_documento_id_tipo, "tipo_de_documento", "id_tipo", "nombre_del_tipo"); ?>">
                        <input type="text" value="<?php echo $product->numero_identificación?>">
                        <input type="text" value="<?php echo $product->nameuser?>">
                    </div>
                    
                </div>
                <div class="contenedor_2">
                    <a class="boton boton_selec" href="./view_update_manage_users.php?id_usuario=<?php echo $product->id_usuario?> & tipo=<?php echo $product -> tipo_de_documento_id_tipo ?> & ciudad=<?php echo $product->ciudad_id_ciudad?> & rol=<?php echo $product->rol_id_rol?> & nombre_persona=<?php echo $product->nombre_persona?> & apellido_persona=<?php echo $product->apellido_persona?> & numero_identificacion=<?php echo $product->numero_identificación?>  & nameuser=<?php echo $product->nameuser?> & celular=<?php echo $product->celuar?>  & fijo=<?php echo $product->fijo?> & direccion=<?php echo $product->direccion?> ">Modificar</a>
                </div>
                <div>
                    <div class="contenedor_1">    
                        <p>Celular</p>
                        <p>Fijo</p>
                        <p>Direccion</p>
                        <p>Ciudad</p>
                        <p>Rol</p>
                    </div>
                    <div class="contenedor_1">
                        <input value="<?php echo $product->celuar?>">
                        <input value="<?php echo $product->fijo?>">
                        <input value="<?php echo $product->direccion?>">
                        <input type="text" value="<?php echo  Usuario::traer_nombre($product->ciudad_id_ciudad, "ciudad", "id_ciudad", "nombre_ciudad");
                        ?>">
                        <input type="text" value="<?php echo  Usuario::traer_nombre($product->rol_id_rol, "rol", "id_rol", "nombre_rol");
                        ?>">
                    </div>
                </div>
                <div class="contenedor_2">
                    <a class="boton boton_selec" href="../models/model_delete_manage_users.php?id_usuario=<?php echo $product->id_usuario ?>">Eliminar</a>
                </div>
                <div class ="desaparecer">
                    <input type="text" value="<?php echo $product->id_usuario ?>">
                </div>
            </article>
        <?php endforeach;?>
        <div class="contenedor_cancelar">
            <a href="./view_manage.php" class="boton_cancelar boton_selec">Volver</a>
        </div>
    </section>
    </form>
</body>
</html>

 <!-- --> 