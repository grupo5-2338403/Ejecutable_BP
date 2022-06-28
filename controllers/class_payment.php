<?php
    class Pago{
        public $intId;
        public $strNombre;
        public $strFoto = 0;
        
        function __construct ($ruta, string $nombre ){
            $this -> strFoto = $ruta;
            $this -> strNombre = $nombre;
        }
        public function setId($id){
            $this -> intId = $id;
        }


        
        public function crear_pago(){
            include("../conectar_BD_2.php");
            $info = $database -> query("SELECT * FROM pago")->fetchAll(PDO::FETCH_OBJ);
            $sql = "INSERT INTO pago (url_foto_pago, metodo_de_pago) VALUES (:foto, :pago)"; 
            $result = $database->prepare($sql);
            $result -> execute (array(":foto"=> $this -> strFoto,":pago"=> $this -> strNombre));
            header("Location:../views/view_configuration_payment.php");
        }
        public function actualizar_pago($id){
            $this -> intId = intval($id);
            include("../conectar_BD_2.php");
            $sql ="UPDATE pago SET url_foto_pago =:foto, metodo_de_pago =:nombre WHERE id_pago =:id";
            $info = $database -> prepare ($sql);
            $info -> execute(array(":foto"=> $this -> strFoto, ":nombre"=> $this -> strNombre, ":id"=>$this -> intId));
            header("Location:../views/view_configuration_payment.php");
            
        }
        public static function borrar_pago($id){
            $id = intval($id);
            // echo var_dump($id);
            include("../conectar_BD_2.php");
            $database->query( "DELETE FROM pago WHERE id_pago='$id'");
            header("Location:../views/view_configuration_payment.php");
        }

    }
?>