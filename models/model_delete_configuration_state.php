<?php
    include ("../controllers/class_states.php");
    $id_estado = $_GET['id_estado'];
    Estado::borrar_estado($id_estado);
?> 