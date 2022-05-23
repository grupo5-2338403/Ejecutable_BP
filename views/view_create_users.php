<!DOCTYPE html>
<!-- language -->
<?php include_once "../static/language.php" ?>
<head>
    <?php include_once "../static/heads/head_secondary_page.php" ?>
    <link rel="stylesheet" href="../static/styles/styles_create_users.css">

</head>
<!-- header secondary page -->
<?php include_once "../static/headers/headers_secondary_page.php" ?>

<body id="body">
    <!-- inicio del formulario -->
    <form action="../models/model_create_users.php" method="POST" class="formulario">
        <!-- contenedor nombre -->
        <div class="a1">
            <label for="nombre_persona">Nombre</label>
            <input class="a2" type="text" name="nombre_persona" required minlength="2" maxlenght="14">
        </div>
        <!-- contenedor apellido -->
        <div class="a1">
            <label for="apellido_persona">Apellido</label>
            <input class="a2" type="text" name="apellido_persona" required minlength="2" maxlenght="14">
        </div>
        <!-- contenedor tipo de docuemnto -->
        <div class="a1">
            <label for="tipo_documento">Tipo de documento</label>
            <select class="a2" name="tipo_documento">
                                    <option value="1">CC</option>
                            </select>
        </div>
        <!-- contenedor numero de documento -->
        <div class="a1">
            <label for="numero_documento">Númerdo de documento</label>
            <input class="a2" type="number" name="numero_documento" min="999999999" max="99999999999" required>
        </div>
        <!-- contendedor username -->
        <div class="a1">
            <label for="username">Correo/Usuario</label>
            <input class="a2" type="email" name="username" required>
        </div>
        <!-- contenedor password -->
        <div class="a1">
            <label for="password_persona">Constraseña</label>
            <input class="a2" type="password" name="password_persona" required minlength="8" maxlenght="22">
        </div>
        <!-- Contenedor número celular -->
        <div class="a1">
            <label for="">Número celular</label>
            <input class="a2" type="tel" name="numero_celular" required min="9999999999" max="999999999990">
        </div>
        <!-- Contenedor Número fijo -->
        <div class="a1">
            <label for="numero_fijo">Número Fijo</label>
            <input class="a2" type="tel" name="numero_fijo" required min="9999999999" max="999999999990">
        </div>
        <!-- Contenedor Dirección -->
        <div class="a1">
            <label for="direccion">Dirección</label>
            <input class="a2" type="text" name="direccion" required>
        </div>
       <!-- Contenedor ciudad -->
        <div class="a1">
            <label for="ciudad">Ciudad</label>
            <select class="a2" name="ciudad" class="a2">
                                <option value="1">Bogotá</option>
                            
            </select>
        </div>
        <!-- Contenedor rol -->
        
        <div class="desaparecer">
            <label for="rol">Rol</label>
            <select class="a2" name="rol">
                                                <option value="1" selected>Administrador</option>
                                <option value="2" selected>Cliente</option>
                            
            </select>
        </div>
        <!-- Contenedor términos y condiciones -->
        <div class="">
            <input type="checkbox" name="terminos_condiciones">
            <a href="">Términos y condiciones</a>
        </div>
        
        <div class="contenedor_cancelar">
            <a href="./view_login.php" class="boton_cancelar boton_selec">Cancelar</a>
        </div>
        <div class="contenedor_envio">
            <input type="submit" value="Guardar" name="guardar" class="boton_enviar boton_selec">
        </div>
    </form>
</body>
</html>

 <!-- --> 