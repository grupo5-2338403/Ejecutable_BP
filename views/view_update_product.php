<?php require_once("../permissions/manager.php")?>
<!DOCTYPE html>
<!-- language -->
<?php include_once "../static/language.php" ?>
<?php require_once "../models/model_update_product.php" ?>
<head>
    <?php include_once "../static/heads/head_secondary_page.php" ?>
    <link rel="stylesheet" href="../static/styles/styles_update_product.css">
</head>
<!-- header secondary page -->
<?php include_once "../static/headers/headers_secondary_page.php" ?>
<body id="body">
    <section> 
        <form action="../models/model_update_product.php" class="formulario" enctype="multipart/form-data" method="post">
            <div class="contenedor_imagen">
                <label for="imagen">Imagen del producto<br>
                    <img src="<?php echo $ruta?>" class="imagen"><br>
                    <input type="file" name="imagen">
                    <input type="text" value="<?php echo $ruta ?>"name="url_imagen" class="desaparece">
                </label>
            </div>
            <div class="contenedor_general">
            <!-- Contenerdor del nombre del producto  -->
            <div class="a1 contenedor_nombre" >
                <label for="nombre_producto">Nombre del producto</label> 
                <input type="text" name="nombre_producto" class="a2 a3" value="<?php echo $nombre?>">
            </div>
            <!-- Contenerdor del valor del producto -->
            <div class="a1 contenedor_valor">
                <label for="valor_producto">Valor del producto</label>
                <input type="number" name="valor_producto" class="a2 a3" step="0.01" value="<?php echo floatval($valor)?>">
            </div>
            <!-- Contenedor del stock del producto -->
            <div class="a1 contenedor_stock">
                <label for="stock_producto">Cantidad disponible del producto</label>
                <input type="number" name="stock_producto" class="input_stock a3" value="<?php echo intval($stock) ?>">
            </div>
            <!-- contenedor del estado del producto -->
            <div class="a1 contenedor_estado">
                <label for="">Estado del producto</label>
                <select name="estado_producto">
                    <?php 
                        require "../conectar_BD_2.php";
                        $info = $database -> query("SELECT * FROM estado")->fetchAll(PDO::FETCH_OBJ);
                        foreach ($info as $product): 
                    ?>
                        <option value="<?php echo $product -> id_estado?>" <?php echo marcar_option($estado, $product -> id_estado)?> ><?php echo $product -> nombre_estado?></option>
                    <?php endforeach;?>

                </select>
            </div>
            <!-- Contenedor de las categoricas del producto -->
            <div class="a1 cotenedor_categoria">
                
                <label for="categoria_producto">Categoria del producto</label>
                <select name="categoria_producto" id="">
                    <?php 
                        require "../conectar_BD_2.php";
                        $info = $database -> query("SELECT * FROM categorias")->fetchAll(PDO::FETCH_OBJ);
                        foreach ($info as $product): 
                    ?>
                        <option value="<?php echo $product -> id_categorias?>" <?php echo marcar_option($categoria, $product -> id_categorias)?>><?php echo $product -> nombre_categorias?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <!-- Contenedor de las marca del producto -->
            <div class="a1 cotenedor_marca">                
                <label for="marca_producto">Marcas</label>
                <select name="marca_producto" id="">
                    <?php 
                        require "../conectar_BD_2.php";
                        $info = $database -> query("SELECT * FROM marca")->fetchAll(PDO::FETCH_OBJ);
                        foreach ($info as $product): 
                    ?>
                        <option value="<?php echo $product -> id_marca?>" <?php echo marcar_option($marca, $product -> id_marca)?> > <?php echo $product -> nombre_marca?> </option>
                    <?php endforeach;?>

                </select>
            </div>
            <!-- Contenedor de la descripción del producto -->
            <div class="a1 contenedor_descripcion">
                <label for="descripcion_producto">Descripción del producto</label>
                <textarea type="text" name="descripcion_producto" class="descripcion"><?php echo $descripcion ?></textarea>    
            </div>
            <!-- contenedor del Id -->
            <div class="desaparece">
                <input type="text" value="<?php echo $id_pro?>" name="id_producto">
            </div>
            <!-- Contenerdor del boton de enviar -->
            <div class="contenedor_cancelar">
                <a href="./index.php" class="boton_cancelar boton_selec">Cancelar</a>
            </div>
            <div class="contenedor_envio">
                <input type="submit" value="enviar" class="boton_enviar boton_selec" name="enviar">
            </div>
        </div>

        </form>
    </section>
    
</body>
</html>