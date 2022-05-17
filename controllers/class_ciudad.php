<?php
    class Ciudad{
        public $intId;
        public $strNombre;
        
        function __construct (string $nombre){
            $this -> strNombre = $nombre;
        }
        public function setId($id){
            $this -> intId = $id;
        }
        
        public function crear_ciudad(){
            include("../conectar_BD_2.php");
            $info = $database -> query("SELECT * FROM ciudad")->fetchAll(PDO::FETCH_OBJ);
            $sql = "INSERT INTO ciudad (nombre_ciudad) VALUES (:ciudad)"; 
            $result = $database->prepare($sql);
            $result -> execute (array(":ciudad"=> $this -> strNombre));
            header("Location:../Configuracion_ciudades/index.php");
        }
        public function actualizar_ciudad($id){
            $this -> intId = intval($id);
            include("../conectar_BD_2.php");
            $sql ="UPDATE ciudad SET nombre_ciudad =:nombre WHERE id_ciudad =:id";
            $info = $database -> prepare ($sql);
            $info -> execute(array(":nombre"=> $this -> strNombre, ":id"=>$this -> intId));
            header("Location:../Configuracion_ciudades/index.php");
            
        }
        public static function borrar_ciudad($id){
            $id = intval($id);
            include("../conectar_BD_2.php");
            $database->query( "DELETE FROM ciudad WHERE id_ciudad='$id'");
            header("Location:../Configuracion_ciudades/index.php");
        }

    }
?>