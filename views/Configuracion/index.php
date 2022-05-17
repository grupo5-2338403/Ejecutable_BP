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
    
    <div class="formulario">

        <div class="a1" >

            <h2 class = "titulo">Usuarios</h2>
            <div>
                <p>Ciudades</p>  <a href="../Configuracion_ciudades" class="boton boton_selec">Editar</a>
            </div>
            <div>
                <p>Tipos de documentos</p> <a href="../Configuracion_tipo" class="boton boton_selec">Editar</a>
            </div>
            <div>
                <p>Roles</p> <a href="../Configuracion_rol" class="boton boton_selec">Editar</a>
            </div>
        </div>
        <div class="a1">
            <h2 class = "titulo">Productos</h2>
            <div>
                <p>Marcas</p> <a href="../Configuracion_marca/index.php" class="boton boton_selec">Editar</a>
            </div>
            <div>
                <p>Estados</p> <a href="../Configuracion_estado/index.php" class="boton boton_selec">Editar</a>
            </div>
            <div>
                <p>Categorias</p> <a href="../Configuracion_categorias/index.php" class="boton boton_selec">Editar</a>
            </div>

        </div>
        <div class="a1">
            <h2 class="titulo">Pagos</h2>
            <div>
                <p>Método de pago</p> <a href="../Configuracion_pago/index.php" class="boton boton_selec">Editar</a>
            </div>
        </div>
        <div class="contenedor_cancelar">
            <a href="../Principal/Index.php" class="boton_cancelar boton_selec">Volver</a>
        </div>
    </div>
</body>
</html>

 <!-- --> 