<?php
    include ("../Controladores/class_ciudad.php");
    $id_ciudad = $_GET['id_ciudad'];          
    Ciudad::borrar_ciudad($id_ciudad);

?>