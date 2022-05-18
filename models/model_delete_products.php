<?php
    include '../Controladores/class_producto.php';
    $id_pro = $_GET["id"];
    Producto::borrar_producto($id_pro);

?>