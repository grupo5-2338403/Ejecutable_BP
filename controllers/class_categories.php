<?php
    class Categorias{
        public $intId;
        public $strNombre;
        
        function __construct (string $nombre){
            $this -> strNombre = $nombre;
        }
        public function setId($id){
            $this -> intId = $id;
        }
        
        public function crear_categorias(){
            include("../conectar_BD_2.php");
            $sql = "INSERT INTO categorias (nombre_categorias) VALUES (:categorias)"; 
            $result = $database->prepare($sql);
            $result -> execute (array(":categorias"=> $this -> strNombre));
            header("Location:../views/view_configuration_categories.php");
        }
        public function actualizar_categorias($id){
            $this -> intId = intval($id);
            include("../conectar_BD_2.php");
            $sql ="UPDATE categorias SET nombre_categorias =:nombre WHERE id_categorias =:id";
            $info = $database -> prepare ($sql);
            $info -> execute(array(":nombre"=> $this -> strNombre, ":id"=>$this -> intId));
            header("Location:../views/view_configuration_categories.php");
            
        }
        public static function borrar_categorias($id){
            $id = intval($id);
            // echo var_dump($id);
            include("../conectar_BD_2.php");
            $database->query( "DELETE FROM categorias WHERE id_categorias='$id'");
            header("Location:../views/view_configuration_categories.php");
        }

    }
?>