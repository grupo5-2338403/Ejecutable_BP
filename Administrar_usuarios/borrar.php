<?php
    require "../Controladores/class_usuarios.php";
    $id = $_GET["id_usuario"];
    Usuario::borrar_usuario($id);
?>