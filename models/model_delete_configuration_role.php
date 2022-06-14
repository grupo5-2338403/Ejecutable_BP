<?php
    include ("../controllers/class_role.php");
    $id_rol = $_GET['id_rol'];
    Rol::borrar_rol($id_rol);
    
?> 