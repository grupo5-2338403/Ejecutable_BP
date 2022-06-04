<!DOCTYPE html>
<!-- language -->
<?php include_once "../static/language.php" ?>
<head>
    <?php include_once "../static/heads/head_secondary_page.php" ?>
    <link rel="stylesheet" href="../static/styles/styles_configuration.css">
</head>
<!-- header secondary page -->
<?php include_once "../static/headers/headers_secondary_page.php" ?>

<body id="body">
    <!-- inicio del formulario -->
    
    <div class="formulario">

        <div class="a1" >

            <h2 class = "titulo">Usuarios</h2>
            <div>
                <p>Ciudades</p>  <a href="./view_configuration_cities.php" class="boton boton_selec">Editar</a>
            </div>
            <div>
                <p>Tipos de documentos</p> <a href="./view_configuration_categories.php" class="boton boton_selec">Editar</a>
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
            <a href="./index.php" class="boton_cancelar boton_selec">Volver</a>
        </div>
    </div>
</body>
</html>

 <!-- --> 