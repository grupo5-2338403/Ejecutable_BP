<?php
    require("../controllers/class_payment.php");
    if (!isset($_POST["guardar"])){
        $id_pago = $_GET["id_pago"];
        $ruta = $_GET["ruta"];
        $nombre_pago = $_GET["nombre_pago"];
    }
    else{

        $ruta = '../data/images/external/payment/' . $_FILES["imagen"]["name"];
        move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);

        $id_pago = $_POST["id_pago"];
        $ruta_2 = $_POST["url_imagen"];
        $nombre_pago = $_POST["nombre_pago"]; 
        if ($ruta == '../data/images/external/payment/'){
            $ruta = $ruta_2;
        }
        
        $obj_pago = new Pago ($ruta, $nombre_pago);
        $obj_pago -> actualizar_pago($id_pago);
        
        
        
    }
?>

