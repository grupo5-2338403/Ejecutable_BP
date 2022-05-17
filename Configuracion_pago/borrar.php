<?php
    include ("../Controladores/class_pago.php");
    $id_pago = $_GET['id_pago'];
    Pago::borrar_pago($id_pago);
    
?> 