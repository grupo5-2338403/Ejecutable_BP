<?php
    session_start();
    if(!isset($_SESSION["id_rol"])){
        header("Location:../views/view_login.php?alerta=3");
    }else if($_SESSION["id_rol"] != 1){
        header("Location:../views/index.php?alerta=6");
    }

?>
