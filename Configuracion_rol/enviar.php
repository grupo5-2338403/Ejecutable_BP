<?php
    require("../Controladores/class_rol.php");
    if(isset($_POST["crear"])){
        $nombre_rol = $_POST["nombre_rol"];
        $obj_rol = new Rol($nombre_rol);
        $obj_rol -> crear_rol();
    }
?> 