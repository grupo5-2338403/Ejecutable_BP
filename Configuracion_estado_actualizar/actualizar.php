<?php
    include ("../Controladores/class_estado.php");
    if (!isset($_POST["guardar"])){
        $id_estado = $_GET["id_estado"];
        $nombre_estado = $_GET["nombre_estado"];
    }
    else{
        $id_estado = $_POST["id_estado"];
        $nombre_estado = $_POST["nombre_estado"]; 
        $obj_estado = new Estado($nombre_estado);
        $obj_estado -> actualizar_estado($id_estado);
    }



?>