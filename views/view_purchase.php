<!DOCTYPE html>
<!-- language -->
<?php include_once "../static/language.php" ?>
<head>
    <?php include_once "../static/heads/head_secondary_page.php" ?>
    <link rel="stylesheet" href="../static/styles/styles_purchase.css">
</head>
<!-- header secondary page -->
<?php include_once "../static/headers/headers_secondary_page.php" ?>
<body id="body">
    <section>
        <form action="../models/model_create_purchase_receipt.php" method="POST" class="formulario">
            <div class="contenedor_pago">
                <label for="">Métodos de pago</label>
                <select name="metodo_de_pago">
                    <?php
                    include ("../conectar_BD_2.php");
                    $info = $database->query("SELECT * FROM pago")->fetchAll(PDO::FETCH_OBJ); 
                    foreach($info as $product):
                    ?>
                        <option value="<?php echo $product->id_pago ?>"><?php echo $product->metodo_de_pago?></option>
                    <?php
                    endforeach;
                    ?>
            </select>
            </div>
            <div class="contenedor_botones">
                <div class="">
                    <a href="./view_cart.php" class="boton_cancelar boton_selec">Volver</a>
                </div>
                <div class="contenedor_envio">
                    <input type="submit" value="enviar" name="enviar" class="boton_enviar boton_selec">
                </div>
            </div>
        </form>
    </section>
 
</body>
</html>