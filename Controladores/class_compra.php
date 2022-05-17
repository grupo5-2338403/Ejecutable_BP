<?php
    class Compra{
        public $intId;
        public $intCantidad;
        public $intProducto;
        public $intUsuario;



        public function setCompra(int $cantidad, int $producto, int $usuario){
            $this -> intCantidad = intval($cantidad);
            $this -> intUsuario = intval($usuario);
            $this -> intProducto = intval($producto);
        }

        public function crear_compra(){
            include("../conectar_BD_2.php");
            $id_comprobante = 0;
            $info = $database->query("SELECT id_comprobante FROM comprobante")->fetchAll(PDO::FETCH_OBJ); 
           foreach($info as $product):
                if($product-> id_comprobante > $id_comprobante){
                    $id_comprobante =  $product -> id_comprobante; 
                }
            endforeach; 
        
            $_SESSION["id_comprobante"] = $id_comprobante;
            $database->query("INSERT INTO compra (cantidad, usuarios_id_usuario, producto_id_producto, comprobante_id_comprobante) VALUES ('".$this -> intCantidad."', '".$this -> intUsuario."', '".$this -> intProducto."',  '".$id_comprobante."')");
            $_SESSION["producto"] = null;
            header("Location:../Comprobante/index.php");
        }

        static function traer_nombre($condicion, $base, $busca, $traer){
            require "../conectar_BD_2.php";
            $info = $database -> query("SELECT * FROM  $base")->fetchAll(PDO::FETCH_OBJ);
            foreach ($info as $product):
                
                if($product -> $busca == $condicion){
                    return $product -> $traer;
                }
            endforeach;
        }

        static function marcar_option($info, $condicion){
            $info = intval($info);
            $condicion = intval($condicion);
            if($info == $condicion){
                echo "selected";
            }
        }
    }
    
    ?>
    