<?php
    class Usuario{
        public $intId;
        public $strNombre;
        public $strApellido;
        public $intTipo;
        public $intDocumento;
        public $strUsername;
        private $strPassword;
        public $intCelular;
        public $intFijo;
        public $strDireccion;
        public $intCiudad;
        public $intRol;
        public $strSesion = false;
        // public $booleanTerminos;
        



        function setUsuario(string $nombre, string $apellido, int $tipo, int $documento, string $username, int $celuar, int $fijo, string $direccion,int $ciudad, int $rol){
            $this -> strNombre = $nombre;
            $this -> strApellido = $apellido;
            $this -> intTipo = intval($tipo);
            $this -> intDocumento = intval($documento);
            $this -> strUsername = $username;
            $this -> intCelular = intval($celuar);
            $this -> intFijo = intval($fijo);
            $this -> strDireccion = $direccion;
            $this -> intCiudad = intval($ciudad);
            $this -> intRol = intval($rol);
        }

        public function setPassword($password){
            $this -> strPassword = $password;
        }

        public function crear_usuario(){
            include("../conectar_BD_2.php");
            $info = $database -> query("SELECT * FROM usuarios")->fetchAll(PDO::FETCH_OBJ);
            $sql = "INSERT INTO usuarios (nombre_persona, apellido_persona, numero_identificación, nameuser, password_persona, celuar, fijo, direccion, ciudad_id_ciudad, tipo_de_documento_id_tipo, rol_id_rol) VALUES (:nombre, :apellido, :documento, :usuario, :pass, :celular, :fijo, :direccion, :ciudad, :tipo, :rol)";
            $product = $database->prepare($sql);
            $product -> execute(array( ":nombre"=> $this -> strNombre, ":apellido"=>$this -> strApellido, ":documento"=>$this -> intDocumento, ":usuario"=>$this -> strUsername, ":pass"=> $this -> strPassword, ":celular"=>$this -> intCelular, ":fijo"=>$this -> intFijo, ":direccion"=>$this -> strDireccion, ":ciudad"=>$this -> intCiudad, ":tipo"=>$this -> intTipo, ":rol"=>$this -> intRol));
            header("Location:../Iniciar_sesion/index.php");
        }

        public function actualizar_usuario($id){
            $this -> intId = intval($id);
            include("../conectar_BD_2.php");
            $sql ="UPDATE usuarios SET nombre_persona=:nombre, apellido_persona=:apellido, numero_identificación=:documento, nameuser=:usuario, celuar=:celular, fijo=:fijo, direccion=:direccion, ciudad_id_ciudad=:ciudad, tipo_de_documento_id_tipo=:tipo, rol_id_rol=:rol WHERE id_usuario=:id";
            $info = $database->prepare($sql);
            $info -> execute(array(":nombre"=>$this -> strNombre, ":apellido"=>$this -> strApellido, ":documento"=>$this -> intDocumento, ":usuario"=>$this -> strUsername, ":celular"=>$this -> intCelular, ":fijo"=> $this-> intFijo, ":direccion"=> $this-> strDireccion, ":ciudad"=>$this -> intCiudad, ":tipo"=> $this-> intTipo, ":rol"=>$this -> intRol, ":id"=> $this-> intId));

            header("Location:../Administrar_usuarios/index.php");
        }

        public static function borrar_usuario($id){
            $id = intval($id);
            // echo var_dump($id);
            include("../conectar_BD_2.php");
            $database->query( "DELETE FROM usuarios WHERE id_usuario='$id'");
            header("Location:../Administrar_usuarios/index.php");
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

        public function iniciar_sesion($user, $pass){
            session_start();
            $_SESSION["user"] = null;
            require "../conectar_BD_2.php";
            $info = $database -> query("SELECT * FROM  usuarios where nameuser='".$user."' and password_persona='".$pass."'")->fetchAll(PDO::FETCH_OBJ);

            if($info != $a){
                foreach ($info as $product):
                    $usuarios = $product -> nameuser;
                    $password = $product -> password_persona;
                    $rol = $product -> rol_id_rol;
                    $id = $product -> id_usuario;
                    $_SESSION["nameuser"] = $user; 
                    $_SESSION["id_rol"] = $rol; 
                    $_SESSION["id_usuario"] = $id;
                    $_SESSION["producto"] = array();

                    header("Location:../Principal/Index.php");                  
                endforeach;
            }
            else{                
                
                header("Location:../Iniciar_sesion/index.php?alarma=1");
            }
        }

        public function cerrar_sesion(){
            session_destroy();
        }
        
    }
       
?>