<?php
    class Tipo{
        public $intId;
        public $strNombre;
        
        function __construct (string $nombre){
            $this -> strNombre = $nombre;
        }
        public function setId($id){
            $this -> intId = $id;
        }
        
        public function crear_tipo(){
            include("../conectar_BD_2.php");
            $info = $database -> query("SELECT * FROM tipo_de_documento")->fetchAll(PDO::FETCH_OBJ);
            $sql = "INSERT INTO tipo_de_documento (nombre_del_tipo) VALUES (:tipo)"; 
            $result = $database->prepare($sql);
            $result -> execute (array(":tipo"=> $this -> strNombre));
            header("Location:../views/view_configuration_document.php");
        }
        public function actualizar_tipo($id){
            $this -> intId = intval($id);
            include("../conectar_BD_2.php");
            $sql ="UPDATE tipo_de_documento SET nombre_del_tipo =:nombre WHERE id_tipo =:id";
            $info = $database -> prepare ($sql);
            $info -> execute(array(":nombre"=> $this -> strNombre, ":id"=>$this -> intId));
            header("Location:../views/view_configuration_document.php");
            
        }
        public static function borrar_tipo($id){
            $id = intval($id);
            // echo var_dump($id);
            include("../conectar_BD_2.php");
            $database->query( "DELETE FROM tipo_de_documento WHERE id_tipo='$id'");
            header("Location:../views/view_configuration_document.php");
        }

    }
?>