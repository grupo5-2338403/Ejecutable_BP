<?php
    class Estado{
        public $intId;
        public $strNombre;
        
        function __construct (string $nombre){
            $this -> strNombre = $nombre;
        }
        public function setId($id){
            $this -> intId = $id;
        }
        
        public function crear_estado(){
            include("../conectar_BD_2.php");
            $sql = "INSERT INTO estado (nombre_estado) VALUES (:estado)"; 
            $result = $database->prepare($sql);
            $result -> execute (array(":estado"=> $this -> strNombre));
            header("Location:../views/view_configuration_state.php");
        }
        public function actualizar_estado($id){
            $this -> intId = intval($id);
            include("../conectar_BD_2.php");
            $sql ="UPDATE estado SET nombre_estado =:nombre WHERE id_estado =:id";
            $info = $database -> prepare ($sql);
            $info -> execute(array(":nombre"=> $this -> strNombre, ":id"=>$this -> intId));
            header("Location:../views/view_configuration_state.php");
            
        }
        public static function borrar_estado($id){
            $id = intval($id);
            // echo var_dump($id);
            include("../conectar_BD_2.php");
            $database->query( "DELETE FROM estado WHERE id_estado='$id'");
            header("Location:../views/view_configuration_state.php");
        }
    }
?>