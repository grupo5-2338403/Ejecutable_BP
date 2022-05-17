<?php
    include ("../Controladores/class_estado.php");
    $id_estado = $_GET['id_estado'];
    Estado::borrar_estado($id_estado);
?> 