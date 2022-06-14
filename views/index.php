<!DOCTYPE html>
<?php include_once "../static/language.php" ?>
<head>
    <?php include_once "../static/heads/head_without_styles.php"?>
    <link rel="stylesheet" href="../static/styles/styles_index.css">
</head>
<img src="../data/images/internal/logo//logo_fondo.PNG" alt="" class="fondo">
<header id="header">
    <?php
        if(isset($_GET["alerta"])){
            echo "<script> alert ('A superado la cantidad disponible de este produto')</script>";
        }
    ?>
    <div class= "" >
        <a href="./view_manage.php"><img src="../data/images/internal/administrator.png" alt="administrar" class="icono_administrador"></a>

    </div>
	<h1 class="imagitec">IMAGITEC</h1>
	<div class="botones_inicio">
		<ul id="mi_cuenta">
			<li>
				<a class="mi_cuenta" href="#">Mi cuenta</a>
				<ul>
					<li><a href="./view_login.php">Iniciar sesión</a></li>
					<li><a href="#mi">Ver cuenta</a></li>
				</ul>
			</li>
		</ul>
    	<div class="in_buscar"> 
        <form action="" name="producto" method="POST">
                <input type="text" name="nombre_producto" id="nombre_producto" placeholder="Coloque el nombre del producto">
                <button class="boton_buscar" type="submit" name="buscar" value="buscar">Buscar</button>       
                <button class="boton_buscar" type="submit" name="Refrescar" value="Refrescar">Listar</button>       
        </form>
		</div>
		<a class="mi_carrito" href="./view_cart.php">Mi carrito</a>
	</div>      
</header>
<body id="body">
    <nav id="nav">
        <ul id="menu">
            <li><a href="#c">Computadores de mesa</a></li>
            <li><a href="#a">Asesorios</a></li>
            <li><a href="#t">Todo gaming</a>
                <ul>
                    <li><a href="#tc">Computadores gamer</a></li>
                    <li><a href="#ta">Acessorios gamer</a></li>
                    <li><a href="#tcc">Componentes gamer</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <section id=section>
        <?php require "../conectar_BD_2.php";

            if(isset($_POST['buscar'])){
                $nombre_producto = $_POST['nombre_producto'];
                $info = $database -> query("select * from producto where nombre_producto like '%$nombre_producto%' ")->fetchAll(PDO::FETCH_OBJ);
            }else{
                $info = $database -> query("SELECT * FROM producto")->fetchAll(PDO::FETCH_OBJ);
            }
            foreach ($info as $product):
        ?>
                
        <article class="article">
            <div class="img">
                <img class="imagen_ini" src="<?php echo $product->url_foto_producto?>"/>
            </div>
            <div class="contenido">
                <h3 class="name_p"><?php echo $product->nombre_producto?></h3>
                <p class="especificaciones"><?php echo $product->descripcion?>
                </p>
            </div>
            <div class="acciones">
                <p class="precio">$<?php echo $product->valor_producto?></p>
                 <div>
                    <a  class="boton"href="../Carrito/index.php?id_producto=<?php echo $product -> id_producto?>">Agregar al carrito</a>
                </div>
                <div>
                    <a href="./view_update_product.php?id=<?php echo $product->id_producto?> & ruta=<?php echo $product->url_foto_producto?> & nombre=<?php echo $product->nombre_producto?> & valor=<?php echo $product->valor_producto?> & stock=<?php echo $product->stock?> & estado=<?php echo $product->estado_id_estado?> & categorias=<?php echo $product->categorias_id_categorias?> & marca=<?php echo $product->marca_id_marca ?> & descripcion=<?php echo $product->descripcion?>" class="boton">Modificar producto</a>
                </div>
                <div>
                    <a href="../models/model_delete_products.php?id=<?php echo $product->id_producto?>" class="boton">Eliminar producto</a>
                </div>
            </div>
        </article>
        <?php endforeach;?>
    </section>
    <footer id="footer">
        <div class="contenido_footer">
            <h3>Contactenos</h3>
            <p>telefono: 208490</p>
            <p>correo: compra@imagitec.com</p>
        </div>
        <div class="configuracion">
            <a href="./view_configuration.php"><img src="../data/images/internal/settings.png" alt="Configuración" class="icono_configuracion"><a>
        </div>
    </footer>
    
</body>
</html> 