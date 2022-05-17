<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ImagiTec</title>
    <link rel="stylesheet" href="./styles.css">
   
</head>
<body id="body">
    <img src="../Imagenes/Logo/logo_fondo.PNG" alt="" class="fondo">
    <header id="header">
        <div class="logo">
            <h2>Imagitec</h2>
            <img src="../Imagenes/Logo/logo_red.PNG" alt="Logo" width=100px>
        </div>
    </header>
    <section>
        <form action="./envio.php" method="POST" class="formulario">
            <div class="contenedor_pago">
                <label for="">Métodos de pago</label>
                <select name="metodo_de_pago">
                    <?php
                    include ("../conectar_BD_2.php");
                    $info = $database->query("SELECT * FROM pago")->fetchAll(PDO::FETCH_OBJ); 
                    foreach($info as $product):
                    ?>
                        <option value="<?php echo $product->id_pago ?>"><?php echo $product->metodo_de_pago?></option>
                    <?php
                    endforeach;
                    ?>
            </select>
            </div>
            <div class="contenedor_botones">
                <div class="">
                    <a href="../Carrito/index.php" class="boton_cancelar boton_selec">Volver</a>
                </div>
                <div class="contenedor_envio">
                    <input type="submit" value="enviar" name="enviar" class="boton_enviar boton_selec">
                </div>
            </div>
        </form>
    </section>
 
</body>
</html>