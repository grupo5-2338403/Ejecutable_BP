<?php
    require ("../Controladores/class_usuarios.php");
    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ImagiTec</title>
    <link rel="stylesheet" href="styles.css">
</head>
<img src="../Imagenes/Logo/logo_fondo_2.PNG" alt="" class="fondo">
<header id=header>
    <div class="logo">
        <h2>Imagitec</h2>
        <img src="../Imagenes/Logo/logo_red.PNG" alt="Logo" width=100px>
    </div>
</header>
<body id="body">

    <section class="section">
        <?php require "../conectar_BD_2.php";
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
                    <a class="boton boton_selec" href="../Administrar_usuarios_actualizar/index.php?id_usuario=<?php echo $product->id_usuario?> & tipo=<?php echo $product -> tipo_de_documento_id_tipo ?> & ciudad=<?php echo $product->ciudad_id_ciudad?> & rol=<?php echo $product->rol_id_rol?> & nombre_persona=<?php echo $product->nombre_persona?> & apellido_persona=<?php echo $product->apellido_persona?> & numero_identificacion=<?php echo $product->numero_identificación?>  & nameuser=<?php echo $product->nameuser?> & celular=<?php echo $product->celuar?>  & fijo=<?php echo $product->fijo?> & direccion=<?php echo $product->direccion?> ">Modificar</a>
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
                    <a class="boton boton_selec" href="./borrar.php?id_usuario=<?php echo $product->id_usuario ?>">Eliminar</a>
                </div>
                <div class ="desaparecer">
                    <input type="text" value="<?php echo $product->id_usuario ?>">
                </div>
            </article>
        <?php endforeach;?>
        <div class="contenedor_cancelar">
            <a href="../Administrar/index.php" class="boton_cancelar boton_selec">Volver</a>
        </div>
    </section>
    </form>
</body>
</html>

 <!-- --> 