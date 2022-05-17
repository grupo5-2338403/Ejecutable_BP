<?php
    include ("../Controladores/class_categorias.php");
    $id_categorias = $_GET['id_categorias'];
    Categorias::borrar_categorias($id_categorias);
    
?> 