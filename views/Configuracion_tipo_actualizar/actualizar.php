<?php
    include ("../Controladores/class_tipo.php");
    if (!isset($_POST["guardar"])){
        $id_tipo = $_GET["id_tipo"];
        $nombre_tipo = $_GET["nombre_tipo"];
    }
    else{
        $id_tipo = $_POST["id_tipo"];
        $nombre_tipo = $_POST["nombre_tipo"]; 
        $obj_tipo = new tipo($nombre_tipo);
        $obj_tipo -> actualizar_tipo($id_tipo);
    }



?>