<?php
    include ("../Controladores/class_rol.php");
    $id_rol = $_GET['id_rol'];
    Rol::borrar_rol($id_rol);
    
?> 