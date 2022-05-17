<!DOCTYPE html>
<?php require ("./actualizar.php") ?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ImagiTec</title>
    <link rel="stylesheet" href="styles.css">
</head>
<img src="../Imagenes/Logo/logo_fondo_2.PNG" alt="" class="fondo">
<header id=header>
    <div class="logo">
        <h2>Imagitec</h2>
        <img src="../Imagenes/Logo/logo_red.PNG" alt="Logo" width=100px>
    </div>
</header>
<body id="body">
    <!-- inicio del formulario -->
    <form action="./actualizar.php" method="POST" class="formulario">
        <!-- contenedor nombre -->
        <label for="">Tipos de documentos</label>
        <div class="a1">
            <div class="desaparecer">
                <input type="text" name="id_tipo" value="<?php echo $id_tipo ?>">   
            </div>
            <input type="text" name="nombre_tipo" value="<?php echo  $nombre_tipo ?>">
            <input type="submit" value="Guardar" name="guardar" class="boton boton_selec">
        </div>
        <div class="contenedor_cancelar">
            <a href="../Configuracion_tipo/index.php" class="boton_cancelar boton_selec">Volver</a>
        </div>
    </form>
</body>
</html>

 <!-- --> 