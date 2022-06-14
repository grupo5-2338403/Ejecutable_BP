<?php
    include ("../controllers/class_document.php");
    if(isset($_POST["crear"])){
        $nombre_tipo = $_POST["nombre_tipo"];
        $obj_tipo = new tipo($nombre_tipo);
        $obj_tipo -> crear_tipo();
    }
?> 