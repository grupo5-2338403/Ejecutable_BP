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
<?php include_once "../static/language.php"?>
<head>
    <?php include_once "../static/heads/head_without_styles.php"?>
    <link rel="stylesheet" href="../static/styles/styles_login.css">
</head>
<header id="header">
    <h1 class="logoName">Imagitec</h1>
    <img src="../data/images/internal/logo/logo_red.PNG" alt="" class="logo">
</header>
<body id="body">
    <section id="section">
        <form action="../models/model_login.php" id="form" method="post">
            <label for="usuario" >Usuario</label>
            <input type="text" id="usuario" placeholder="example@example.com" name="usuario">
            <Label for="password">Contraseña</Label>
            <input type="password" id="password" name="password">
            <div class="desaparecer">
                <input type="password" id="password" name="rol">
            </div>
            <a href="#recuperar" class="recuperar">Recuperar mi contraseña</a>
            <div class="botones">
                <a href="./view_create_users.php" class="registrarse">Registrarse</a>
                <input type="submit" class="iniciar" value="Iniciar sesión" name="iniciar">
            </div>
        </form>
    </section>
    <footer id="footer">
        <a href="./index.php" class="volver">Volver</a>
    </footer>
</body>
</html>