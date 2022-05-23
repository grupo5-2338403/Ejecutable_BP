<?php
    include ("../controllers/class_cities.php");
    $id_ciudad = $_GET['id_ciudad'];          
    Ciudad::borrar_ciudad($id_ciudad);

?>