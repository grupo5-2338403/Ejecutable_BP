<?php
    require("../controllers/class_users.php");
    
    if(isset($_POST["guardar"])){
        $nombre = $_POST["nombre_persona"];
        $apellido = $_POST["apellido_persona"];
        $tipo = $_POST["tipo_documento"];
        $numero_documento = $_POST["numero_documento"];
        $username = $_POST["username"];
        $password = $_POST["password_persona"];
        $numero_celular = $_POST["numero_celular"];
        $numero_fijo = $_POST["numero_fijo"];
        $direccion = $_POST["direccion"];
        $ciudad = $_POST["ciudad"];
        $rol = $_POST["rol"];

        $obj_usuario = new Usuario();
        $obj_usuario -> setUsuario($nombre, $apellido, $tipo, $numero_documento, $username, $numero_celular, $numero_fijo, $direccion, $ciudad, $rol);
        $obj_usuario -> setPassword($password);
        $obj_usuario -> crear_usuario();
    }
    
    function elegir_cliente($condicion){
        $condicion = intval($condicion);
        if($condicion = 2){ 
            echo "selected";
        }
        
    }
?>