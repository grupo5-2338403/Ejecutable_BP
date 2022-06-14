<?php
    class Marca{
        public $intId;
        public $strNombre;
        
        function __construct (string $nombre){
            $this -> strNombre = $nombre;
        }
        public function setId($id){
            $this -> intId = $id;
        }
        
        public function crear_marca(){
            include("../conectar_BD_2.php");
            $info = $database -> query("SELECT * FROM marca")->fetchAll(PDO::FETCH_OBJ);
            $sql = "INSERT INTO marca (nombre_marca) VALUES (:marca)"; 
            $result = $database->prepare($sql);
            $result -> execute (array(":marca"=> $this -> strNombre));
            header("Location:../views/view_configuration_brand.php");
        }
        public function actualizar_marca($id){
            $this -> intId = intval($id);
            include("../conectar_BD_2.php");
            $sql ="UPDATE marca SET nombre_marca =:nombre WHERE id_marca =:id";
            $info = $database -> prepare ($sql);
            $info -> execute(array(":nombre"=> $this -> strNombre, ":id"=>$this -> intId));
            header("Location:../views/view_configuration_brand.php");
            
        }
        public static function borrar_marca($id){
            $id = intval($id);
            // echo var_dump($id);
            include("../conectar_BD_2.php");
            $database->query( "DELETE FROM marca WHERE id_marca='$id'");
            header("Location:../views/view_configuration_brand.php");
        }

    }
?>