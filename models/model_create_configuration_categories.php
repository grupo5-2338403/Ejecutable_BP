<?php
    require("../controllers/class_categories.php");
    if(isset($_POST["crear"])){
        $nombre_categorias = $_POST["nombre_categorias"];
        $obj_categorias = new Categorias($nombre_categorias);
        $obj_categorias -> crear_categorias();
    }
?> 