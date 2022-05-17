<?php
    include ("../Controladores/class_rol.php");
    if (!isset($_POST["guardar"])){
        $id_rol = $_GET["id_rol"];
        $nombre_rol = $_GET["nombre_rol"];
    }
    else{
        $id_rol = $_POST["id_rol"];
        $nombre_rol = $_POST["nombre_rol"]; 
        $obj_rol = new Rol($nombre_rol);
        $obj_rol -> actualizar_rol($id_rol);
    }



?>