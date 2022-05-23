<!DOCTYPE html>
<!-- language -->
<?php include_once "../static/language.php" ?>
<head>
    <?php require_once "../models/model_update_manage_users.php" ?>
    <?php require_once ("../controllers/class_users.php"); ?>
    <?php include_once "../static/heads/head_secondary_page.php" ?>
    <link rel="stylesheet" href="../static/styles/styles_update_manage_users.css">
</head>
<!-- header secondary page -->
<?php include_once "../static/headers/headers_secondary_page.php" ?>

<body id="body">
    <!-- inicio del formulario -->
    <form action="../models/model_update_manage_users.php" method="POST" class="formulario">

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
            <a href="./view_manage_users.php" class="boton_cancelar boton_selec">Cancelar</a>
        </div>
        <div class="contenedor_envio">
            <input type="submit" value="Guardar" name="guardar" class="boton_enviar boton_selec">
        </div>
    </form>
</body>
</html>

 <!-- --> 