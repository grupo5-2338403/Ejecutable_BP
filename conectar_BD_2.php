<?php
// conectar a la base de datos
try{
    $database = new PDO("mysql:host=localhost; dbname=imagitec_2","root","");

    $database -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $database -> exec("SET CHARACTER SET UTF8");
}
catch(exception $e){
    die("Error" . $e->getMessage());
    echo "Linea del error ". $e->getLine();
}
?>