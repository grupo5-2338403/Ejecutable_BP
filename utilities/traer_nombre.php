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