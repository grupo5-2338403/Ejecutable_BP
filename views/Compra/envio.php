<?php
require ("../Controladores/class_compra.php");
require ("../Controladores/class_comprobante.php");

session_start();
date_default_timezone_set('America/Bogota');


if(isset($_POST["enviar"])){
    if(isset($_SESSION["id_usuario"])){
        $contador = array_count_values($_SESSION["producto"]);
        $metodo_de_pago = $_POST["metodo_de_pago"];
        $fecha = date('y/m/d');
        $hora = date('H:i:s');
        $sub_total = $_SESSION["total"] - $_SESSION["total"] * 0.19 ;
        $total = $_SESSION["total"];
        $obj_comprobante = new Comprobante();
        $obj_comprobante -> setComprobante($fecha, $hora, $metodo_de_pago, $sub_total, $total);
        $obj_comprobante -> crear_comprobante();

        foreach(array_keys($contador) as $e):
            $cantidad = $contador[$e];
            $id_producto = $e;
            $id_usuario = $_SESSION["id_usuario"];
            $obj_compra = new Compra();
            $obj_compra -> setCompra($cantidad, $id_producto, $id_usuario);
            $obj_compra -> crear_compra();
            // header("Location:../Comprobante/index.php");
        endforeach;
    }else{
        header("Location:../Iniciar_sesion/index.php?alarma=2");
    }

}

?>