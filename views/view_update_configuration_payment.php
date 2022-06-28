<?php require_once("../permissions/manager.php")?>
<!DOCTYPE html>
<!-- language -->
<?php include_once "../static/language.php" ?>
<head>
    <?php include_once ("../models/model_update_configuration_payment.php") ?>
    <?php include_once "../static/heads/head_secondary_page.php" ?>
    <link rel="stylesheet" href="../static/styles/styles_update_payment.css">
</head>
<!-- header secondary page -->
<?php include_once "../static/headers/headers_secondary_page.php" ?>

<body id="body">
    <!-- inicio del formulario -->
    <form action="../models/model_update_configuration_payment.php" enctype="multipart/form-data" method="POST" class="formulario">
        <!-- contenedor nombre -->
        
        
        <div class="a1">
            <h1>Pago</h1>
            <div class="desaparecer">
                <input type="text" name="id_pago" value="<?php echo $id_pago ?>"> 
                <input type="text" value="<?php echo $ruta ?>"name="url_imagen">  
            </div>

            <img src="<?php echo $ruta?>" class="imagen" width="100" height="100">
            <br>
            <input type="text" name="nombre_pago" value="<?php echo  $nombre_pago ?>">


            <div class="div_file">
                <p id="texto">Actualizar Foto</p>
                <input type="file" id="btn_enviar" name="imagen">
            </div>
            
            <input type="submit" value="Guardar" name="guardar" class="div_file">

            <a href="./view_configuration_payment.php" class="div_file" >Volver</a>
        </div>

        <div >
            
        </div>
    </form>
</body>
</html>