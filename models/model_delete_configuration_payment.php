<?php
    require("../controllers/class_payment.php");
    $id_pago = $_GET['id_pago'];
    Pago::borrar_pago($id_pago);
    
?> 