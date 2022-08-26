<?php
    include_once("../conectar_BD_2.php");
    require_once("../controllers/class_users.php");
    if(isset($_POST["guardar"])){
        $username = $_POST["username"];
        $condition = $database -> query("SELECT * FROM usuarios where nameuser = '".$username."'")->fetchAll(PDO::FETCH_OBJ);
        if(count($condition) == 0){
            $nombre = $_POST["nombre_persona"];
            $apellido = $_POST["apellido_persona"];
            $tipo = $_POST["tipo_documento"];
            $numero_documento = $_POST["numero_documento"];
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
        }else{
            header("Location:../views/view_create_users.php?alerta=7");                   
        }
    }
?>