<?php
    include ("../Controladores/class_categorias.php");
    if (!isset($_POST["guardar"])){
        $id_categorias = $_GET["id_categorias"];
        $nombre_categorias = $_GET["nombre_categorias"];
    }
    else{
        $id_categorias = $_POST["id_categorias"];
        $nombre_categorias = $_POST["nombre_categorias"]; 
        $obj_categorias = new Categorias ($nombre_categorias);
        $obj_categorias -> actualizar_categorias($id_categorias);
    }



?>