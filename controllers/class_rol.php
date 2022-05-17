<?php
    class rol{
        public $intId;
        public $strNombre;
        
        function __construct (string $nombre){
            $this -> strNombre = $nombre;
        }
        public function setId($id){
            $this -> intId = $id;
        }
        
        public function crear_rol(){
            include("../conectar_BD_2.php");
            $info = $database -> query("SELECT * FROM rol")->fetchAll(PDO::FETCH_OBJ);
            $sql = "INSERT INTO rol (nombre_rol) VALUES (:rol)"; 
            $result = $database->prepare($sql);
            $result -> execute (array(":rol"=> $this -> strNombre));
            header("Location:../Configuracion_rol/index.php");
        }
        public function actualizar_rol($id){
            $this -> intId = intval($id);
            include("../conectar_BD_2.php");
            $sql ="UPDATE rol SET nombre_rol =:nombre WHERE id_rol =:id";
            $info = $database -> prepare ($sql);
            $info -> execute(array(":nombre"=> $this -> strNombre, ":id"=>$this -> intId));
            header("Location:../Configuracion_rol/index.php");
            
        }
        public static function borrar_rol($id){
            $id = intval($id);
            // echo var_dump($id);
            include("../conectar_BD_2.php");
            $database->query( "DELETE FROM rol WHERE id_rol='$id'");
            header("Location:../Configuracion_rol/index.php");
        }

    }
?>