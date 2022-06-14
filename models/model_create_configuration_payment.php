<?php
    require("../controllers/class_payment.php");
    if(isset($_POST["crear"])){
        $nombre_pago = $_POST["nombre_pago"];
        $obj_pago = new Pago($nombre_pago);
        $obj_pago -> crear_pago();
    }
?> 