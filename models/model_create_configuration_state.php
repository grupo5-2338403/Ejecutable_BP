<?php
    require("../controllers/class_states.php");
    if(isset($_POST["crear"])){
        $nombre_estado = $_POST["nombre_estado"];
        $obj_estado = new Estado($nombre_estado);
        $obj_estado -> crear_estado();
        }
    
?> 