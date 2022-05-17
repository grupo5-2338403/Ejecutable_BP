<?php 
    require ("./carrito.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ImagiTec</title>
    <link rel="stylesheet" href="./style.css">
    <script src="../Validacion/validacion.js"></script>
</head>
<body id="body">
    <img src="../Imagenes/Logo/logo_fondo.PNG" alt="" class="fondo">
    <header id="header">
        <div class="logo">
            <h2>Imagitec</h2>
            <img src="../Imagenes/Logo/logo_red.PNG" alt="Logo" width=100px>
        </div>
    </header>
    <section id="section">
        <?php
            if(isset($_SESSION["producto"])){            
                $contador = array_count_values($_SESSION["producto"]);
                foreach(array_keys($contador) as $e):
        ?>
        <form method="POST" id="formulario">
        <article id="producto">
            <?php 
                require ("../conectar_BD_2.php");
                $info = $database -> query("SELECT * FROM producto WHERE id_producto='".$e."'")->fetchAll(PDO::FETCH_OBJ);
                foreach ($info as $product):
                    $stock_producto = $product->stock;
                    $cantidad_carrito = $contador[$e];
                    $nombre_producto = trim($product->nombre_producto);
                    if($stock_producto == 0 ||  $cantidad_carrito > $stock_producto ){
                        while($cantidad_carrito != $stock_producto){
                            $clave = array_search($e, $_SESSION["producto"]);
                            unset($_SESSION["producto"][$clave]);
                            $cantidad_carrito -= 1;                           
                            header("Location:../Principal/Index.php?alerta=1");
                        }
                    }   
            ?>
        
            <img src="<?php echo $product->url_foto_producto?>" alt="producto" class="imagen_producto">
            <div class="info_producto">
                <h3 class="titulo"><?php echo $product->nombre_producto ?></h3>
                <p><?php echo $product->descripcion ?></p>
            </div>
            <div class="botones_producto">
                <label for="cantidad" class="acercarse">Cantidad:</label>
                <input type="text" id="cantidad" class="acercarse2" name="<?php echo $e ?>" value="<?php echo $contador[$e]?>" min=1>
                <p class="acercarse">Valor:</p>
                <p class="acercarse2">$<?php echo $product->valor_producto?></p>
                <a href="./index.php?eliminar=<?php echo $e ?>" class="boton_quitar_carrito">Quitar del carrito</a>
            </div>
        </article>
        </form>
        <?php
                    endforeach;
                endforeach;
            }
        ?>
        <article id="total">
            <h3 class="titulo_miCompra">Mi compra </h3>
            <div class="total_producto">
                <h4 class="producto_name">Producto</h4>
                <h4 class="cantidad_2">Cantidad</h4>
                <h4 class="valor">Valor</h4>
                <h4 class="sub_total">Sub total</h4>
                <?php 
                    if(isset($_SESSION["producto"])){
                        foreach(array_keys($contador) as $e):
                            require ("../conectar_BD_2.php");
                            $info = $database -> query("SELECT * FROM producto WHERE id_producto='".$e."'")->fetchAll(PDO::FETCH_OBJ);
                            foreach ($info as $product):
                ?>
                <!-- /////////////////////////// -->
                <p class="producto_name"><?php echo $product->nombre_producto ?></p>
                <p class="cantidad_2" id="<?php echo $e?>"><?php echo $contador[$e]?></p>
                <p class="valor">$<?php echo $product->valor_producto?></p>
                <p class="sub_total">$<?php echo $_SESSION["sub_total"] = $product->valor_producto * $contador[$e]; if (isset($total)){
                    $total += $_SESSION["sub_total"];
                }else{
                    $total = $_SESSION["sub_total"];
                }?></p>
                <?php
                        endforeach;
                    endforeach;  
                }
                ?>
            </div>
            <div class="total_total">
                <h4 class="total_1">Total:</h4>
                <p class="total_num"><?php
                if(isset($total)){
                    $_SESSION["total"] = $total; 
                    echo "$" . $_SESSION["total"];
                } 
                ?></p>  
            </div>
        </article>
        <div id="botones">
            <a href="../Principal/Index.php" class="boton volver" >Seguir Comprando</a>
            <a href="<?php if(isset($_SESSION["id_usuario"])){ echo '../Compra/index.php'; } else { echo '../Iniciar_sesion/index.php?alarma=2';} ?>" class="boton seguir"  onClick="return validarCarrito(<?php if(isset($_SESSION["producto"])){if(empty($_SESSION["producto"])){echo "0"; }else{ echo "1";}} ?>)">Ir a pagar
            </a>
        </div>
    </section>
 
</body>
</html>