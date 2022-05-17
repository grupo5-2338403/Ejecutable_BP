<?php
    require("../Controladores/class_producto.php");
        
    if(!isset($_POST["enviar"])){
        $id_pro = $_GET["id"];
        $ruta = $_GET["ruta"];
        $nombre = $_GET["nombre"];
        $valor = $_GET["valor"];
        $stock = $_GET["stock"];
        $estado = $_GET["estado"];
        $categoria = $_GET["categorias"];
        $marca = $_GET["marca"];
        $descripcion = $_GET["descripcion"];
        
    }
    else{
        $ruta = '../Imagenes/' . $_FILES["imagen"]["name"];
        move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
        $id_pro =  $_POST["id_producto"];
        $ruta_2 = $_POST["url_imagen"];
        $nombre = $_POST["nombre_producto"];
        $valor = $_POST["valor_producto"];
        $stock = $_POST["stock_producto"];
        $estado = $_POST["estado_producto"];
        $categoria = $_POST["categoria_producto"];
        $marca = $_POST["marca_producto"];
        $descripcion = $_POST["descripcion_producto"];
        if ($ruta == "../Imagenes/"){
            $ruta = $ruta_2;
        }
        
        $producto = new Producto($ruta, $nombre, $valor, $stock, $estado, $categoria, $marca, $descripcion);
        $producto -> actualizar_producto($id_pro);      
    }

    function marcar_option($info, $condicion){
        $info = intval($info);
        if($info == $condicion){
            echo "selected";
        }
    }
    
?>
