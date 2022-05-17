<?php
    include ("../Controladores/class_tipo.php");
    $id_tipo = $_GET['id_tipo'];
    Tipo::borrar_tipo($id_tipo);
    
?> 