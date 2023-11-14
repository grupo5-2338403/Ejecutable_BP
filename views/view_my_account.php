<?php require ("../permissions/client.php")?>
<!DOCTYPE html>
<!-- language -->
<?php include_once "../static/language.php" ?>
<head>
    <?php include_once "../static/heads/head_secondary_page.php" ?>
    <link rel="stylesheet" href="../static/styles/styles_my_account.css">
    <?php include_once "../utilities/traer_nombre.php"?>
</head>
<!-- header secondary page -->
<?php include_once "../static/headers/headers_secondary_page.php" ?>
<body id="body">
    <article id="article">
        <?php 
            require_once("../conectar_BD_2.php");
            $id_usuario = $_SESSION['id_usuario'];
            $info = $database -> query("SELECT * FROM usuarios where id_usuario = $id_usuario")->fetchAll(PDO::FETCH_OBJ);
            foreach ($info as $user):
        ?>
            <section id="person">
                <div class="div_1">
                    <h3>Nombre</h3>
                    <p><?php echo $user -> nombre_persona." "; echo $user -> apellido_persona?></p>
                </div>
                <div class="div_1">
                    <h3>Número de indentificación</h3>
                    <p><?php echo traer_nombre($user->tipo_de_documento_id_tipo, "tipo_de_documento", "id_tipo", "nombre_del_tipo")." "; echo $user -> numero_identificación?></p>
                </div>
                <div class="div_1">
                    <h3>Dirección</h3>
                    <p><?php echo traer_nombre($user->ciudad_id_ciudad, "ciudad", "id_ciudad", "nombre_ciudad")." "; echo $user -> direccion?></p>
                </div>
                <div class="div_1">
                    <h3>Número celular</h3>
                    <p><?php echo $user -> celuar ?></p>
                </div>
                <div class="div_1">
                    <h3>Usuario / Correo</h3>
                    <p><?php echo $user -> nameuser ?></p>
                </div>
                <div class="div_1">
                    <h3>Número fijo</h3>
                    <p><?php echo $user -> fijo ?></p>
                </div>
            </section>
            <div class="gestores">
                <a class="boton" href="./view_update_manage_users.php?id_usuario=<?php echo $user->id_usuario?> & tipo=<?php echo $user -> tipo_de_documento_id_tipo ?> & ciudad=<?php echo $user->ciudad_id_ciudad?> & rol=<?php echo $user->rol_id_rol?> & nombre_persona=<?php echo $user->nombre_persona?> & apellido_persona=<?php echo $user->apellido_persona?> & numero_identificacion=<?php echo $user->numero_identificación?>  & nameuser=<?php echo $user->nameuser?> & celular=<?php echo $user->celuar?>  & fijo=<?php echo $user->fijo?> & direccion=<?php echo $user->direccion?>">Modificar</a>
            </div>
        <?php
                endforeach;
        ?>
        <div id="botones">
            <a href="./index.php" class="boton volver" >Volver</a>
        </div>
    </article>
</body>
</html>