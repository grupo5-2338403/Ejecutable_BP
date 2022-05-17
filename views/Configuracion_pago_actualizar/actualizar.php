<?php
    include ("../Controladores/class_pago.php");
    if (!isset($_POST["guardar"])){
        $id_pago = $_GET["id_pago"];
        $nombre_pago = $_GET["nombre_pago"];
    }
    else{
        $id_pago = $_POST["id_pago"];
        $nombre_pago = $_POST["nombre_pago"]; 
        $obj_pago = new Pago ($nombre_pago);
        $obj_pago -> actualizar_pago($id_pago);
    }



?>