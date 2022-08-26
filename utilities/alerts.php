<?php
    if(isset($_GET["alerta"])){

        // ALERTS FOR THE VIEW_LOGIN
        create_alerts("1", "El usuario o la contraseña es invalida");
        create_alerts("2", "Inicie sesión para poder hacer la compra");
        create_alerts("3", "Inicie sesión para poder acceder a esta página");
        create_alerts("4", "Inicie sesión para poder agregar el producto al carrito");

        // ALERTS FOR THE INDEX
        create_alerts("5", "A superado la cantidad disponible de este produto");
        create_alerts("6", "Este usuario no tiene los permisos de acceder aquí");

        // ALERTS FOR THE VIEW_CREATE_USERS
        create_alerts("7", "El usuario ya existe");
    }

    function create_alerts($condition_1, $message){
        if ($_GET["alerta"] == $condition_1){
            echo "<script> alert ('$message')</script>";
        }
    }
?>