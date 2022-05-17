<!DOCTYPE html>
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
    <form action="./enviar.php" method="POST" class="formulario">
        <!-- contenedor nombre -->
        <label for="nombre_persona">Pago</label>
        <div class="a1">
            <input type="text" name="nombre_pago" required>
            <input type="submit" value="Crear" name="crear" class="boton boton_selec" >
        </div>
        <div class="a1">
            <label for="">Creados</label>
            <div>
                <?php require "../conectar_BD_2.php";
                    $info = $database -> query("SELECT * FROM pago")->fetchAll(PDO::FETCH_OBJ);
                    foreach ($info as $product):
                ?>
                <input type="text" name="" class="creados" value="<?php echo $product -> metodo_de_pago?>" readonly>

                <a href="../Configuracion_pago_actualizar/index.php?id_pago=<?php echo $product -> id_pago?> & nombre_pago=<?php echo $product->metodo_de_pago?>" class="boton_cancelar boton_selec">Editar</a>
                <a href="./borrar.php?id_pago=<?php echo $product -> id_pago ?>" class="boton_cancelar boton_selec">Borrar</a>
                 
                <?php endforeach;?>
            </div>
        </div>
 
        
        <div class="contenedor_cancelar">
            <a href="../Configuracion/index.php" class="boton_cancelar boton_selec">Volver</a>
        </div>
    </form>
</body>
</html>

 <!-- --> 