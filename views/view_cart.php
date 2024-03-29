<?php require ("../models/model_cart.php")?>
<!DOCTYPE html>
<!-- language -->
<?php include_once "../static/language.php" ?>
<head>
    <?php include_once "../static/heads/head_secondary_page.php" ?>
    <link rel="stylesheet" href="../static/styles/styles_cart.css">
    <script src="../validations/validate_cart.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
    <script src="../utilities/currency_format.js"></script>
</head>
<!-- header secondary page -->
<?php include_once "../static/headers/headers_secondary_page.php" ?>
<body id="body">
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
                            header("Location:../views/index.php?alerta=5");
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
                <p id="cantidad" class="acercarse2" name="<?php echo $e ?>" ><?php echo $contador[$e]?></p>
                <p class="acercarse">Valor:</p>
                <p class="acercarse2"><?php echo "<script>document.write(currency_format($product->valor_producto))</script>" ?></p>
                <a href="./view_cart.php?eliminar=<?php echo $e ?>" class="boton_quitar_carrito">Quitar del carrito</a>
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
                <p class="valor"><?php echo "<script>document.write(currency_format($product->valor_producto))</script>"?></p>
                <p class="sub_total"><?php $_SESSION["sub_total"] = $product->valor_producto * $contador[$e]; if (isset($total)){
                    $total += $_SESSION["sub_total"];
                }else{
                    $total = $_SESSION["sub_total"];

                }
                $sub_total =$_SESSION["sub_total"];
                echo "<script>document.write(currency_format($sub_total))</script>";
                ?></p>
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
                    echo "<script>document.write(currency_format($_SESSION[total]))</script>";
                } 
                ?></p>  
            </div>
        </article>
        <div id="botones">
            <a href="./index.php" class="boton volver" >Seguir Comprando</a>
            <a href="<?php if(isset($_SESSION["id_usuario"])){ echo './view_purchase.php'; } else { echo './view_login.php?alerta=2';} ?>" class="boton seguir"  onClick="return validate_cart(<?php if(isset($_SESSION["producto"])){if(empty($_SESSION["producto"])){echo "0"; }else{ echo "1";}} ?>)">Ir a pagar
            </a>
        </div>
    </section>
</body>
</html>