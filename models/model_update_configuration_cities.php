<?php
    include ("../controllers/class_cities.php");
    if (!isset($_POST["guardar"])){
        $id_ciudad = $_GET["id_ciudad"];
        $nombre_ciudad = $_GET["nombre_ciudad"];
    }
    else{
        $id_ciudad = $_POST["id_ciudad"];
        $nombre_ciudad = $_POST["nombre_ciudad"]; 
        $obj_ciudad = new Ciudad($nombre_ciudad);
        $obj_ciudad -> actualizar_ciudad($id_ciudad);
        
    }



?>