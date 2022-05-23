<?php
    include ("../controllers/class_cities.php");
    if(isset($_POST["crear"])){
        $nombre_ciudad = $_POST["nombre_ciudad"];
        $obj_ciudad = new Ciudad($nombre_ciudad);
        $obj_ciudad -> crear_ciudad();
    } 
?> 