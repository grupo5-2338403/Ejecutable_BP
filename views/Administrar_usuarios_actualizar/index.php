<?php
    require "../Controladores/class_usuarios.php"
?>
<?php require "./actualizar.php" ?>

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
    <!-- inicio del formulario -->
    <form action="./actualizar.php" method="POST" class="formulario">

        <!-- contenedor nombre -->
        <div class="a1">
            <label for="nombre_persona">Nombre</label>
            <input type="text" name="nombre_persona" value="<?php echo $nombre ?>">
        </div>
        <!-- contenedor apellido -->
        <div class="a1">
            <label for="apellido_persona">Apellido</label>
            <input type="text" name="apellido_persona" value="<?php echo $apellido ?>">
        </div>
        <!-- contenedor tipo de docuemnto -->
        <div class="a1">
            <label for="tipo_documento">Tipo de documento</label>
            <select name="tipo_documento">
                <?php 
                    require "../conectar_BD_2.php";
                    $info = $database -> query("SELECT * FROM tipo_de_documento")->fetchAll(PDO::FETCH_OBJ);
                    foreach ($info as $product): 
                ?>
                    <option value="<?php echo $product->id_tipo?>" <?php echo Usuario::marcar_option($tipo, $product->id_tipo) ?>><?php echo $product -> nombre_del_tipo ?></option>
                <?php 
                     endforeach;
                ?>
            </select>
        </div>
        <!-- contenedor numero de documento -->
        <div class="a1">
            <label for="numero_documento">Númerdo de documento</label>
            <input type="text" name="numero_documento" value="<?php echo $numero_documento ?>">
        </div>
        <!-- contendedor username -->
        <div class="a1">
            <label for="username">Corre/usuario</label>
            <input type="email" name="username" value="<?php echo $username ?>">
        </div>
        <!-- Contenedor número celular -->
        <div class="a1">
            <label for="">Número celular</label>
            <input type="text" name="numero_celular" value="<?php echo $numero_celular ?>">
        </div>
        <!-- Contenedor Número fijo -->
        <div class="a1">
            <label for="numero_fijo">Número Fijo</label>
            <input type="text" name="numero_fijo" value="<?php echo $numero_fijo ?>">
        </div>
        <!-- Contenedor Dirección -->
        <div class="a1">
            <label for="direccion">Dirección</label>
            <input type="text" name="direccion" value="<?php echo $direccion ?>">
        </div>
       <!-- Contenedor ciudad -->
        <div class="a1">
            <label for="ciudad">Ciudad</label>
            <select name="ciudad">
                <?php 
                    require "../conectar_BD_2.php";
                    $info = $database -> query("SELECT * FROM ciudad") -> fetchAll(PDO::FETCH_OBJ);
                    foreach ($info as $product):
                ?>
                <option value="<?php echo $product -> id_ciudad?>" <?php echo Usuario::marcar_option($ciudad, $product->id_ciudad)?> ><?php echo $product -> nombre_ciudad?></option>
                <?php endforeach; ?>          
            </select>
        </div>
        <!-- Contenedor rol -->
        
        <div class="a1">
            <label for="rol">Rol</label>
            <select name="rol">
                <?php 
                    require "../conectar_BD_2.php";
                    $info = $database -> query("SELECT * FROM rol") -> fetchAll(PDO::FETCH_OBJ);
                    foreach ($info as $product):
                ?>
                <option value="<?php echo $product->id_rol ?>" <?php echo Usuario::marcar_option($rol, $product->id_rol) ?> ><?php echo $product-> nombre_rol?></option>
                <?php 
                endforeach; 
                ?>            
            </select>
        </div>
        <div class="a1 desaparecer">
            <label for="">id</label>
            <input type="text" value="<?php echo $id_usuario ?>" name="id_usuario">
        </div>
        
        <div class="contenedor_cancelar">
            <a href="../Administrar_usuarios/index.php" class="boton_cancelar boton_selec">Cancelar</a>
        </div>
        <div class="contenedor_envio">
            <input type="submit" value="Guardar" name="guardar" class="boton_enviar boton_selec">
        </div>
    </form>
</body>
</html>

 <!-- --> 