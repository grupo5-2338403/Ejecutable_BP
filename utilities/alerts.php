<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="../utilities/styles_alerts.js"></script>
<?php
    if(isset($_GET["alerta"])){

        // ALERTS FOR THE VIEW_LOGIN
        create_alerts("1", "Error" ,"El usuario o la contraseña es invalida", "error");
        create_alerts("2", "Error", "Inicie sesión para poder hacer la compra", "error");
        create_alerts("3", "Error", "Inicie sesión para poder acceder a esta página", "error");
        create_alerts("4", "Error", "Inicie sesión para poder agregar el producto al carrito", "error");

        // ALERTS FOR THE INDEX
        create_alerts("5", "Error", "A superado la cantidad disponible de este produto", "error");
        create_alerts("6","Error", "Este usuario no tiene los permisos para accedera esa página", "error");

        // ALERTS FOR THE VIEW_CREATE_USERS
        create_alerts("7", "Error","El usuario ya existe", "error");
    }

    function create_alerts($condition_1, $title=NULL, $message=NULL , $icon=NULL){
        if ($_GET["alerta"] == $condition_1){ 
            echo "<script>send_alert({title:'$title', text:'$message', icon:'$icon'})</script>";
        }
    }
?>