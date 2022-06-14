<?php 
    session_start();
    if (isset($_GET["id_producto"])){
        if(!isset($_SESSION["producto"])){
            $_SESSION["producto"] = array(intval($_GET["id_producto"]));
        }
        else{
            // $_SESSION["producto"] = null;
            array_push($_SESSION["producto"], intval($_GET["id_producto"]));
        }
    
        header("Location:../Principal/Index.php");
    }
    if (isset($_GET["eliminar"])){
        $contador = array_count_values($_SESSION["producto"]);
        $e = intval($_GET["eliminar"]);
        if($contador[$e] > 0 ){
            $clave = array_search($e, $_SESSION["producto"]);
            unset($_SESSION["producto"][$clave]);
            header("Location:../Carrito/index.php"); 
    
        }
    }
    
?>