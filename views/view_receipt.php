<?php
    if(isset($_GET["imprimir"])){
        echo "<script>print()</script>";
    }
?>
<?php session_start();?>
<!DOCTYPE html>
<!-- language -->
<?php include_once "../static/language.php" ?>
<head>
    <?php include_once "../utilities/traer_nombre.php"?>
    <?php include_once "../static/heads/head_secondary_page.php" ?>
    <link rel="stylesheet" href="../static/styles/styles_receipt.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
    <script src="../utilities/currency_format.js"></script>
    <?php require_once("../conectar_BD_2.php");?>
</head>
<!-- header secondary page -->
<?php include_once "../static/headers/headers_secondary_page.php" ?>
<body id="body">
    <section class="section">
        <h2>Comprobante</h2>
        <div class="person">
            <div>
                <?php 
                    $info = $database -> query("SELECT * FROM comprobante WHERE id_comprobante = '".$_SESSION["id_comprobante"]."' ")->fetchAll(PDO::FETCH_OBJ);
                ?>
                <h3>Codigo</h3>
                <p><?php echo $info[0]-> id_comprobante?></p>
            </div> 
            <?php 
                $info = $database -> query("SELECT * FROM usuarios WHERE id_usuario = '".$_SESSION["id_usuario"]."' ")->fetchAll(PDO::FETCH_OBJ);
            ?>   
            <div>
                <h3>Nombre</h3>
                <p><?php echo $info[0]->nombre_persona.$info[0]->apellido_persona?></p>
            </div>
            <div>
                <h3>Tipo</h3>
                <p><?php echo traer_nombre($info[0]->tipo_de_documento_id_tipo, "tipo_de_documento", "id_tipo", "nombre_del_tipo")?></p>
            </div>
            <div>
                <h3>Documento</h3>
                <P><?php echo $info[0]->numero_identificación?></P>
            </div>

        </div>
        <div class="compras">
            <div class="productos">
                <div class="titulos">
                    <h3>Producto</h3>
                    <h3>Valor</h3>
                    <h3>Cantidad</h3>
                    <h3>Sub Total</h3>
                </div>
                <?php 
                    $info = $database -> query("SELECT * FROM compra WHERE comprobante_id_comprobante = '".$_SESSION["id_comprobante"]."' ")->fetchAll(PDO::FETCH_OBJ);
                    foreach ($info as $product):  
                ?> 
                <div class="contenido">
                    <p><?php echo traer_nombre($product->producto_id_producto, "producto", "id_producto", "nombre_producto") ?></p>
                    <p><?php $valor = traer_nombre($product->producto_id_producto, "producto", "id_producto", "valor_producto"); echo "<script>document.write(currency_format($valor))</script>"; ?> </p>
                    <p><?php echo $product->cantidad ?></p>
                    <p><?php echo "<script>document.write(currency_format($valor * $product->cantidad))</script>"?></p>
                </div>
                <?php endforeach; ?>
            </div>
            <hr>
            <div class="totales">
                <?php 
                    $info = $database -> query("SELECT * FROM comprobante WHERE id_comprobante = '".$_SESSION["id_comprobante"]."' ")->fetchAll(PDO::FETCH_OBJ);
                    foreach ($info as $product):  
                ?> 
                <div class="a1">
                    <h4>Metodo de pago</h4>
                    <p><?php echo traer_nombre($product->pago_id_pago, "pago", "id_pago", "metodo_de_pago") ?></p>
                </div>
                <div class="a1">
                    <h4>Sin IVA</h4>
                    <p><?php echo "<script>document.write(currency_format($product->sub_total))</script>";?></p>
                </div>
                <div class="a1">
                    <h4>total</h4>
                    <p><?php echo "<script>document.write(currency_format($product->total))</script>";?></p>
                </div>
                <?php endforeach;?>
            </div>
        </div>
        <div class="contenedor_botones">
                <a href="./index.php" class="boton_cancelar boton_selec">Volver</a>
            <form class="contenedor_envio">
                <input type="submit" name="imprimir" value="Imprimir" class="boton_enviar boton_selec">
            </form>
        </div>
        
    </section>
 
</body>
</html>