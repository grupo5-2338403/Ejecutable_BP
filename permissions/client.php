<?php
    session_start();
    if(!isset($_SESSION["id_rol"])){
        header("Location:../views/view_login.php?alerta=3");
    }
?>