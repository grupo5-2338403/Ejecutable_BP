<?php
    require("../Controladores/class_marca.php");
    if(isset($_POST["crear"])){
        $nombre_marca = $_POST["nombre_marca"];
        $obj_marca = new Marca($nombre_marca);
        $obj_marca -> crear_marca();
    }
?> 