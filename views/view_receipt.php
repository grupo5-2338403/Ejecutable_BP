<?php
function traer_nombre($condicion, $base, $busca, $traer){
    require "../conectar_BD_2.php";
    $info = $database -> query("SELECT * FROM  $base")->fetchAll(PDO::FETCH_OBJ);
    foreach ($info as $product):
        
        if($product -> $busca == $condicion){
            return $product -> $traer;
        }
    endforeach;
} 
?>
<?php
    if(isset($_GET["imprimir"])){
        echo "<script>print()</script>";
    }
?>
<!DOCTYPE html>
<!-- language -->
<?php include_once "../static/language.php" ?>
<head>
    <?php include_once "../static/heads/head_secondary_page.php" ?>
    <link rel="stylesheet" href="../static/styles/styles_receipt.css">
</head>
<!-- header secondary page -->
<?php include_once "../static/headers/headers_secondary_page.php" ?>
<body id="body">
    <section class="section">
        <?php session_start();?>
        <h3>Compras</h3>
        <div class="compras">
            <div class="titulos">
                <p>Nombre</p>
                <p>Cantidad</p>
                <p>Valor</p>
            </div>
            <?php 
                require("../conectar_BD_2.php");
                $info = $database -> query("SELECT * FROM compra WHERE comprobante_id_comprobante = '".$_SESSION["id_comprobante"]."' ")->fetchAll(PDO::FETCH_OBJ);
                foreach ($info as $product):  
            ?> 
            <div class="contenido">
                <p><?php echo traer_nombre($product->producto_id_producto, "producto", "id_producto", "nombre_producto") ?></p>
                <p><?php echo $product->cantidad ?></p>
                <p><?php echo traer_nombre($product->producto_id_producto, "producto", "id_producto", "valor_producto") ?> </p>
            </div>
            <?php endforeach; ?>
        </div>
        <hr>
        <?php 
            $info = $database -> query("SELECT * FROM comprobante WHERE id_comprobante = '".$_SESSION["id_comprobante"]."' ")->fetchAll(PDO::FETCH_OBJ);
            foreach ($info as $product):  
        ?> 
        <div class="a1">
            <h4>Metodo de pago</h4>
            <p><?php echo traer_nombre($product->pago_id_pago, "pago", "id_pago", "metodo_de_pago") ?></p>
        </div>
        <div class="a1">
            <h4>sub total</h4>
            <p><?php echo $product->sub_total;?></p>
        </div>
        <div class="a1">
            <h4>total</h4>
            <p><?php echo $product->total; ?></p>
        </div>
        <?php endforeach;?>
        <div class="contenedor_botones">
                <a href="./index.php" class="boton_cancelar boton_selec">Volver</a>
            <form class="contenedor_envio">
                <input type="submit" name="imprimir" value="Imprimir" class="boton_enviar boton_selec">
            </form>
        </div>
        
    </section>
 
</body>
</html>