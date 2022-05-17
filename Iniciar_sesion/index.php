<?php 
    if(isset($_GET["alarma"])){
        if($_GET["alarma"] == "1"){
            echo "<script> alert('El usuario o la contraseña es invalida')</script>";
        }
        else if($_GET["alarma"] == "2") {
            echo "<script> alert('Inicie sesión para poder hacer la compra')</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ImagiTec</title>
    <link rel="stylesheet" href="style.css">
</head>
<body id="body">
    <header id="header">
        <h1 class="logoName">Imagitec</h1>
        <img src="../Imagenes/Logo/logo_red.PNG" alt="" class="logo">
    </header>
    <section id="section">
        <form action="./iniciar.php" id="form" method="post">
            <label for="usuario" >Usuario</label>
            <input type="text" id="usuario" placeholder="example@example.com" name="usuario">
            <Label for="password">Contraseña</Label>
            <input type="password" id="password" name="password">
            <div class="desaparecer">
                <input type="password" id="password" name="rol">
            </div>
            <a href="#recuperar" class="recuperar">Recuperar mi contraseña</a>
            <div class="botones">
                <a href="../Usuarios/index.php" class="registrarse">Registrarse</a>
                <input type="submit" class="iniciar" value="Iniciar sesión" name="iniciar">
            </div>
        </form>
    </section>
    <footer id="footer">
        <a href="../Principal/Index.php" class="volver">Volver</a>
    </footer>
    
</body>
</html>