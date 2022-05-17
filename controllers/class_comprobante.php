<?php
    class Comprobante{
        public $intId;
        public $fecha;
        public $hora;
        public $intPago;
        public $floatSub_total;
        public $floatTotal;        



        public function setComprobante( $fecha, $hora, string $pago, float $sub_total, float $total){
            $this -> fecha = $fecha;
            $this -> hora = $hora;
            $this -> intPago = intval($pago);
            $this -> floatSub_total = floatval($sub_total);
            $this -> floatTotal = floatval($total);
        }

        public function crear_comprobante(){
            include("../conectar_BD_2.php");
            $database->query("INSERT INTO comprobante (fecha, hora, sub_total, total, pago_id_pago) VALUES ('".$this -> fecha."', '".$this -> hora."', '".$this -> floatSub_total."', '".$this -> floatTotal."', '".$this -> intPago."')");            
        }
        
    }
    
    ?>
    