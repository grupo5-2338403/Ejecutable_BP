<?php session_start(); ?>
<!DOCTYPE html>
<?php include_once "../static/language.php" ?>
<head>
    <?php include_once "../static/heads/head_without_styles.php"?>
    <link rel="stylesheet" href="../static/styles/styles_index.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
    <script src="../utilities/currency_format.js"></script>

</head>
<img src="../data/images/internal/logo//logo_fondo.PNG" alt="" class="fondo">
<header id="header">
    <div class= "" >
        <?php if(isset($_SESSION["id_rol"]) && $_SESSION["id_rol"] == 1){ ?>
            <a href="./view_manage.php"><img src="../data/images/internal/administrator.png" alt="administrar" class="icono_administrador"></a>
        <?php } ?>        
    </div>
	<h1 class="imagitec">IMAGITEC</h1>
	<div class="botones_inicio">
		<ul id="mi_cuenta">
			<li>
				<a class="mi_cuenta" href="#">Mi cuenta</a>
				<ul>
                    <?php if(isset($_SESSION["id_usuario"])){ ?>
                        <li><a href="../models/model_sign_off.php">Cerrar sesión</a></li>
    					<li><a href="./view_my_account.php">Ver cuenta</a></li>
                    <?php }else{ ?>
                        <li><a href="./view_login.php">Iniciar sesión</a></li>
                    <?php } ?>
				</ul>
			</li>
		</ul>
    	<div class="in_buscar"> 
            <form action="" name="producto" method="POST">
                <input type="text" name="nombre_producto" id="nombre_producto" placeholder="Coloque el nombre del producto">
                <button class="boton_buscar" type="submit" name="buscar" value="buscar">Buscar</button>       
                <button class="boton_buscar" type="submit" name="Refrescar" value="Refrescar">Todo</button>       
        </form>
		</div>
		<a class="mi_carrito" href="./view_cart.php">Mi carrito</a>
        <?php if(isset($_SESSION["producto"])){ ?>
            <span class="contador_carrito">
                <?php echo count($_SESSION["producto"]);?>
            <span>
        <?php } ?>
	</div>      
</header>
<body id="body">
    <form action="" name="producto" method="POST">
    <nav id="nav">
        <ul id="menu">
            <li><button class="menu_content" type="submit" name="computadores_mesa" value="computadores_mesa">Computadores de mesa</button></li>       
            <li><button class="menu_content" type="submit" name="accesorios" value="accesorios">Accesorios</button></li>
            <li><a href="#t">Todo gaming</a>
                <ul>
                    <li><button class="menu_content" type="submit" name="computadores_gamer" value="computadores_gamer">Computadores gamer</button></li>
                    <li><button class="menu_content" type="submit" name="accesorios_gamer" value="accesorios_gamer">Accesorios gamer</button></li>
                    <li><button class="menu_content" type="submit" name="componentes_gamer" value="componentes_gamer">Componentes gamer</button></li>
                </ul>
            </li>
        </ul>
    </nav>
    </form>
    <section id=section>
        <?php 
            require_once "../conectar_BD_2.php";
            require_once "../utilities/traer_nombre.php";

            if(isset($_POST['buscar'])){
                $nombre_producto = $_POST['nombre_producto'];
                $info = $database -> query("select * from producto where nombre_producto like '%$nombre_producto%' ")->fetchAll(PDO::FETCH_OBJ);
            }else if(isset($_POST['computadores_mesa'])){
                $info = $database -> query("select * from producto where categorias_id_categorias = 1")->fetchAll(PDO::FETCH_OBJ);
            }else if(isset($_POST['accesorios'])){
                $info = $database -> query("select * from producto where categorias_id_categorias = 2")->fetchAll(PDO::FETCH_OBJ);
            }else if(isset($_POST['computadores_gamer'])){
                $info = $database -> query("select * from producto where categorias_id_categorias = 3")->fetchAll(PDO::FETCH_OBJ);
            }else if(isset($_POST['accesorios_gamer'])){
                $info = $database -> query("select * from producto where categorias_id_categorias = 4")->fetchAll(PDO::FETCH_OBJ);
            }else if(isset($_POST['componentes_gamer'])){
                $info = $database -> query("select * from producto where categorias_id_categorias = 5")->fetchAll(PDO::FETCH_OBJ);
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
                <h3 class="name_product"><?php echo $product->nombre_producto?></h3>
                <p class="especificaciones"><?php echo $product->descripcion?>
                </p>
                <p class="componentes"><?php echo traer_nombre($product->marca_id_marca, "marca", "id_marca", "nombre_marca");?></p>
                <p class="componentes"><?php echo traer_nombre($product->categorias_id_categorias, "categorias", "id_categorias", "nombre_categorias");?></p>
            </div>
            <div class="acciones">
                <p class="precio"><?php echo "<script>document.write(currency_format($product->valor_producto))</script>" ?></p>
                 <div>
                    <?php if(isset($_SESSION["id_usuario"])){ ?>
                        <a  class="boton" href="./view_cart.php?id_producto=<?php echo $product -> id_producto?>">Agregar al carrito</a>
                    <?php } else{?>
                        <a  class="boton" href="./view_login.php?alerta=4">Agregar al carrito</a>
                    <?php } ?>
                </div>
                <?php if(isset($_SESSION["id_rol"]) && $_SESSION["id_rol"] == 1){ ?>
                    <div>
                        <a href="./view_update_product.php?id=<?php echo $product->id_producto?> & ruta=<?php echo $product->url_foto_producto?> & nombre=<?php echo $product->nombre_producto?> & valor=<?php echo $product->valor_producto?> & stock=<?php echo $product->stock?> & estado=<?php echo $product->estado_id_estado?> & categorias=<?php echo $product->categorias_id_categorias?> & marca=<?php echo $product->marca_id_marca ?> & descripcion=<?php echo $product->descripcion?>" class="boton">Modificar producto</a>
                    </div>
                    <div>
                        <a href="../models/model_delete_products.php?id=<?php echo $product->id_producto?>" class="boton">Eliminar producto</a>
                    </div>
                <?php } ?>
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
        <?php if(isset($_SESSION["id_rol"]) && $_SESSION["id_rol"] == 1){ ?>
            <div class="configuracion">
                <a href="./view_configuration.php"><img src="../data/images/internal/settings.png" alt="Configuración" class="icono_configuracion"><a>
            </div>
        <?php } ?>
    </footer>    
</body>

<?php include_once("../utilities/alerts.php") ?>
</html> 