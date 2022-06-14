<?php
    include ("../controllers/class_document.php");
    $id_tipo = $_GET['id_tipo'];
    Tipo::borrar_tipo($id_tipo);
    
?> 