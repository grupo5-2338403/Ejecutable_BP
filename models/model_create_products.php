<?php
    require("../controllers/class_product.php");
        
    if(isset($_POST["enviar"])){
        $ruta = '../data/images/external/products/' . $_FILES["imagen"]["name"];
        move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
        $nombre = $_POST["nombre_producto"];
        $valor = $_POST["valor_producto"];
        $stock = $_POST["stock_producto"];
        $estado = $_POST["estado_producto"];
        $categoria = $_POST["categoria_producto"];
        $marca = $_POST["marca_producto"];
        $descripcion = $_POST["descripcion_producto"];
        $producto = new Producto($ruta, $nombre, $valor, $stock, $estado, $categoria, $marca, $descripcion);
        $producto -> crear_producto();
    }
    
?> 