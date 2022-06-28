<?php
    session_start();
    if(!isset($_SESSION["id_rol"])){
        header("Location:../views/view_login.php?alarma=3");
    }else if($_SESSION["id_rol"] != 1){
        header("Location:../views/index.php?alarma=1");
    }

?>
