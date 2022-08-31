<?php
function traer_nombre($condicion, $base, $busca, $traer){
    // traer_nombre($product->marca_id_marca, "marca", "id_marca", "nombre_marca");
    require "../conectar_BD_2.php";
    $info = $database -> query("SELECT * FROM  $base")->fetchAll(PDO::FETCH_OBJ);
    foreach ($info as $product):      
        if($product -> $busca == $condicion){
            return $product -> $traer;
        }
    endforeach;
}
?>