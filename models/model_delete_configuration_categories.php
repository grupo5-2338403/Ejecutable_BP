<?php
    include_once ("../controllers/class_categories.php");
    $id_categorias = $_GET['id_categorias'];
    Categorias::borrar_categorias($id_categorias);
    
?> 