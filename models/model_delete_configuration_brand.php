<?php
    include ("../controllers/class_brand.php");
    $id_marca = $_GET['id_marca'];
    Marca::borrar_marca($id_marca);
    
?> 