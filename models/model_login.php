<?php 
    include("../controllers/class_users.php");
    if(isset($_POST["iniciar"])){
        $usuario = $_POST["usuario"];
        $password = $_POST["password"];
        $obj_usuario = new Usuario();
        $obj_usuario -> iniciar_sesion($usuario, $password);
    }
  
?>