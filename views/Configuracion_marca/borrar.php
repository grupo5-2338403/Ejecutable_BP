<?php
    include ("../Controladores/class_marca.php");
    $id_marca = $_GET['id_marca'];
    Marca::borrar_marca($id_marca);
    
?> 