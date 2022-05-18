<?php
    require "../controllers/class_users.php";
    $id = $_GET["id_usuario"];
    Usuario::borrar_usuario($id);
?>