<?php
    include '../controllers/class_product.php';
    $id_pro = $_GET["id"];
    Producto::borrar_producto($id_pro);

?>