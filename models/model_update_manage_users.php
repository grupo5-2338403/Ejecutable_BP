<?php
    
    if(!isset($_POST["guardar"])){
        $id_usuario = $_GET["id_usuario"];
        $nombre = $_GET["nombre_persona"];
        $apellido = $_GET["apellido_persona"];
        $numero_documento = $_GET["numero_identificacion"];
        $username = $_GET["nameuser"];
        $numero_celular = $_GET["celular"];
        $numero_fijo = $_GET["fijo"];
        $direccion = $_GET["direccion"];
        $tipo = ($_GET["tipo"]);
        $ciudad = $_GET["ciudad"];   
        $rol = $_GET["rol"];      
    }
    else{
        include_once("../conectar_BD_2.php");
        require_once("../controllers/class_users.php");
        $username = $_POST["username"];
        $condition = $database -> query("SELECT * FROM usuarios where nameuser = '".$username."'")->fetchAll(PDO::FETCH_OBJ);
        if(count($condition) == 0){
            $nombre = $_POST["nombre_persona"];
            $apellido = $_POST["apellido_persona"];
            $tipo = $_POST["tipo_documento"];
            $numero_documento = $_POST["numero_documento"];
            $numero_celular = $_POST["numero_celular"];
            $numero_fijo = $_POST["numero_fijo"];
            $direccion = $_POST["direccion"];
            $ciudad = $_POST["ciudad"];
            $rol = $_POST["rol"];
            $id_usuario = $_POST["id_usuario"];

            $obj_usuario = new Usuario();
            $obj_usuario -> setUsuario($nombre, $apellido, $tipo, $numero_documento, $username, $numero_celular, $numero_fijo, $direccion, $ciudad, $rol);
            $obj_usuario->actualizar_usuario($id_usuario);
        }else{
            echo("<script>alert('Este usuario ya existe')</script>");
            $id_usuario = $_GET["id_usuario"];
            $nombre = $_GET["nombre_persona"];
            $apellido = $_GET["apellido_persona"];
            $numero_documento = $_GET["numero_identificacion"];
            $username = $_GET["nameuser"];
            $numero_celular = $_GET["celular"];
            $numero_fijo = $_GET["fijo"];
            $direccion = $_GET["direccion"];
            $tipo = ($_GET["tipo"]);
            $ciudad = $_GET["ciudad"];   
            $rol = $_GET["rol"];   
        }
    }