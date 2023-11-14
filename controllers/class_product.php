<?php
    class Producto{
        public $intId;
        public $strFoto = 0;
        public $strNombre;
        public $floatValor = 0;
        public $intStock = 0;
        public $intEstado = 0;
        public $intCategorias = 0;
        public $intMarca = 0;
        public $strDescripcion;
        
        function __construct($foto, string $nombre,float $valor, int $stock, int $estado, int $categoria, int $marca, string $descripcion){
            $this -> strFoto = $foto;
            $this -> strNombre = $nombre;
            $this -> floatValor = floatval($valor);
            $this -> intStock = intval($stock);
            $this -> intEstado = intval($estado);
            $this -> intCategoria = intval($categoria);
            $this -> intMarca = intval($marca);
            $this -> strDescripcion = $descripcion;
        }
        public function setId($id){
            $this -> intId = $id;
        }
        
        public function crear_producto(){
            include("../conectar_BD_2.php");
            $info = $database -> query("SELECT * FROM producto")->fetchAll(PDO::FETCH_OBJ);
            $sql = "INSERT INTO producto (url_foto_producto, nombre_producto, valor_producto, stock, estado_id_estado, categorias_id_categorias, marca_id_marca, descripcion) VALUES (:foto, :nombre, :valor, :stock, :estado, :categorias, :marca, :descripcion)";
            $result = $database->prepare($sql);
            $result -> execute(array( ":foto"=> $this -> strFoto, ":nombre"=>$this -> strNombre, ":valor"=>$this -> floatValor, ":stock"=>$this -> intStock, ":estado"=> $this -> intEstado, ":categorias"=>$this -> intCategoria,":marca"=>$this->intMarca, ":descripcion"=>$this -> strDescripcion));
            header("Location:../views/index.php");
        }
        public function actualizar_producto($id){
            $this -> intId = intval($id);
            include("../conectar_BD_2.php");
            $sql ="UPDATE producto SET url_foto_producto=:miFoto, nombre_producto=:miNombre, valor_producto=:miValor, stock=:miStock, estado_id_estado=:miEstado, categorias_id_categorias=:miCategorias, marca_id_marca=:miMarca, descripcion=:miDescripcion WHERE id_producto=:miId";
            $info = $database->prepare($sql);
            $info -> execute(array(":miFoto"=>$this -> strFoto, ":miNombre"=>$this -> strNombre, ":miValor"=>$this -> floatValor, ":miStock"=>$this -> intStock, ":miEstado"=>$this -> intEstado, ":miCategorias"=> $this-> intCategoria, ":miMarca"=> $this-> intMarca, ":miDescripcion"=>$this -> strDescripcion, ":miId"=> $this-> intId));

            header("Location:../views/index.php");
        }
        public static function borrar_producto($id){
            $id = intval($id);
            // echo var_dump($id);
            include("../conectar_BD_2.php");
            $database->query( "DELETE FROM producto WHERE id_producto='$id'");
            header("Location:../views/index.php");
        }

    }
?>