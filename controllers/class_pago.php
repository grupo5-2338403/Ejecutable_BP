<?php
    class Pago{
        public $intId;
        public $strNombre;
        
        function __construct (string $nombre){
            $this -> strNombre = $nombre;
        }
        public function setId($id){
            $this -> intId = $id;
        }
        
        public function crear_pago(){
            include("../conectar_BD_2.php");
            $sql = "INSERT INTO pago (metodo_de_pago) VALUES (:pago)"; 
            $result = $database->prepare($sql);
            $result -> execute (array(":pago"=> $this -> strNombre));
            header("Location:../Configuracion_pago/index.php");
        }
        public function actualizar_pago($id){
            $this -> intId = intval($id);
            include("../conectar_BD_2.php");
            $sql ="UPDATE pago SET metodo_de_pago =:nombre WHERE id_pago =:id";
            $info = $database -> prepare ($sql);
            $info -> execute(array(":nombre"=> $this -> strNombre, ":id"=>$this -> intId));
            header("Location:../Configuracion_pago/index.php");
            
        }
        public static function borrar_pago($id){
            $id = intval($id);
            // echo var_dump($id);
            include("../conectar_BD_2.php");
            $database->query( "DELETE FROM pago WHERE id_pago='$id'");
            header("Location:../Configuracion_pago/index.php");
        }

    }
?>