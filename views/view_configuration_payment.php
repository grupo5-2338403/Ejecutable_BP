<!DOCTYPE html>
<!-- language -->
<?php include_once "../static/language.php" ?>
<head>
    <?php include_once "../static/heads/head_secondary_page.php" ?>
    <link rel="stylesheet" href="../static/styles/styles_payment.css">
    <?php require_once("../permissions/manager.php")?>
</head>
<!-- header secondary page -->
<?php include_once "../static/headers/headers_secondary_page.php" ?>

<body id="body">
    <!-- inicio del formulario -->
    <form action="../models/model_create_configuration_payment.php" enctype="multipart/form-data" method="POST" class="formulario">
        
        
        <div class="a1">
            <!-- contenedor nombre -->
            <h4 class="titulo">PAGO</h4><br>

            <div id="div_file">
                <label id="texto" for="imagen">Añadir Foto</label>
                <input type="file" name="imagen" id="btn_enviar">
            </div>

            <br>

            <input type="text" name="nombre_pago" required placeholder="Nombre del metodo de pago"><br>

            <input type="submit" value="Crear" name="crear" class="submit1" >
            <br>
 
        </div>

        <h4 class="titulo">Metodos de pago creados</h4>

        <article class="article"> 

            <?php require "../conectar_BD_2.php";
                $info = $database -> query("SELECT * FROM pago")->fetchAll(PDO::FETCH_OBJ);
                foreach ($info as $product):
            ?>  
        
            <div class="pagos">

                <div class="imagen_ini">
                    <img class="imagen_ini" src="<?php echo $product->url_foto_pago?>"/>
                </div>

                <div class="contenido">
                    <h3 class="creados"><?php echo $product -> metodo_de_pago?></h3>
                </div>
                    

                <div class="acciones">
                    <a href="./view_update_configuration_payment.php?id_pago=<?php echo $product -> id_pago?> & ruta=<?php echo $product->url_foto_pago?> & nombre_pago=<?php echo $product->metodo_de_pago?>" class="submit1">Editar</a>
                </div> 
                
                <div class="acciones2">
                    <a href="../models/model_delete_configuration_payment.php?id_pago=<?php echo $product -> id_pago ?>" class="submit2">Borrar</a>
                </div>
                
                 

            </div>  

            <?php endforeach;?>  

            <a href="./view_configuration.php" class="submit3">Volver</a>

        </article>            
        
            
    </form>
</body>

 <!-- --> 