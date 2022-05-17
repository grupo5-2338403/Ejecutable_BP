<?php
    include ("../Controladores/class_marca.php");
    if (!isset($_POST["guardar"])){
        $id_marca = $_GET["id_marca"];
        $nombre_marca = $_GET["nombre_marca"];
    }
    else{
        $id_marca = $_POST["id_marca"];
        $nombre_marca = $_POST["nombre_marca"]; 
        $obj_marca = new Marca($nombre_marca);
        $obj_marca -> actualizar_marca($id_marca);
    }



?>