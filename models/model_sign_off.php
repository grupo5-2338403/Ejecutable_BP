<?php
    include_once ("../controllers/class_users.php");
    Usuario::cerrar_sesion();
    header("Location:../views/index.php");

    

?>