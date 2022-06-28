<?php
    require("../controllers/class_payment.php");
    if(isset($_POST["crear"])){

        $ruta = '../data/images/external/payment/' . $_FILES["imagen"]["name"];
        move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
        $nombre_pago = $_POST["nombre_pago"];
        $obj_pago = new Pago($ruta, $nombre_pago);
        $obj_pago -> crear_pago();
    }
?> 