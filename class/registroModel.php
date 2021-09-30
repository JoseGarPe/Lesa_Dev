<?php 
    require_once "config/conexion.php";
    class Registro extends Conexion
    {
        
        private $id_stickers;
        private $fecha_recibido;   
        private $hora_recibido; 
        private $orden_perdido; 
        private $fecha_laboratorio;            
        private $fecha_salida;
        private $hora_salida;        
        private $id_sucursal;
        private $cliente_optica;
        private $fecha_mensajero;
        private $hora_mensajero;
        private $estado;
        private $created_at;      
        private $updated_at; 
        //------------------------------------------------------------------//
        private $sticker;

          

        public function __construct()
            {
                parent::__construct(); //Llamada al constructor de la clase padre
                $this->id_stickers = "";
                $this->fecha_recibido = "";
                $this->hora_recibido = "";
                $this->orden_pedido = "";
                $this->fecha_laboratorio = "";
                $this->fecha_salida = "";
                $this->hora_salida = "";
                $this->id_sucursal = "";
                $this->cliente_optica = "";
                $this->fecha_mensajero = "";
                $this->hora_mensajero = "";
                $this->estado = "";

                $this->created_at = "";
                $this->updated_at = "";

            }

            public function getId_sticker() {
                return $this->id_sticker;
            }
        
            public function setId_sticker($id) {
                $this->id_sticker = $id;
            }    
                    
            public function getFecha_recibido() {
                return $this->fecha_recibido;
            }

            public function setFecha_recibido($id) {
                $this->fecha_recibido = $id;
            }
            public function getHora_recibido() {
                return $this->hora_recibido;
            }
        
            public function setHora_recibido($id) {
                $this->hora_recibido = $id;
            }
            public function getOrden_pedido() {
                return $this->orden_pedido;
            }
        
            public function setOrden_pedido($id) {
                $this->orden_pedido = $id;
            }
            public function getFecha_laboratorio() {
                return $this->fecha_laboratorio;
            }
        
            public function setFecha_laboratorio($id) {
                $this->fecha_laboratorio = $id;
            }
            public function getFecha_salida() {
                return $this->fecha_salida;
            }
        
            public function setFecha_salida($id) {
                $this->fecha_salida = $id;
            }
            public function getHora_salida() {
                return $this->hora_salida;
            }
        
            public function setHora_salida($id) {
                $this->hora_salida = $id;
            }
            public function getId_sucursal() {
                return $this->id_sucursal;
            }
        
            public function setId_sucursal($id) {
                $this->id_sucursal = $id;
            }
            public function getCliente_optica() {
                return $this->cliente_optica;
            }
        
            public function setCliente_optica($id) {
                $this->cliente_optica = $id;
            }
            public function getFecha_mensajero() {
                return $this->fecha_mensajero;
            }
        
            public function setFecha_mensajero($id) {
                $this->fecha_mensajero = $id;
            }
            public function getHora_mensajero() {
                return $this->hora_mensajero;
            }
        
            public function setHora_mensajero($id) {
                $this->hora_mensajero = $id;
            }
            public function getEstado() {
                return $this->estado;
            }
        
            public function setEstado($id) {
                $this->estado = $id;
            }
            //--------------------------------------------------------------------------------//
            
            public function getSticker() {
                return $this->id_sticers;
            }
        
            public function setSticker($id) {
                    $query="SELECT * FROM sticker_generado WHERE stickers='$id'";
                    $selectall=$this->db->query($query);
                    $ListUsuario=$selectall->fetch_all(MYSQLI_ASSOC);
                   foreach($ListUsuario as $value){
                        $this->id_stickers=$value['id_generado'];
                   }
            }

            //--------------------------------------------------------------------------------//
            public function saveMensajero()
            {
                $query="INSERT INTO registro_trabajos(id_generado,fecha_mensajero,hora_mensajero,estado,id_sucursal) VALUES($this->id_stickers,'$this->fecha_mensajero','$this->hora_mensajero','Recibido por mensajero',$this->id_sucursal);";
                $save=$this->db->query($query);
                if ($save==true) {
                    return true;
                }else {
                    
                    return false;
                }   
            }
            public function saveRecepcion()
            {
                $query="UPDATE registro_trabajos SET fecha_recibido='$this->fecha_recibido',hora_recibido='$this->hora_recibido',estado='Recibido en Recepcion',updated_at=CURDATE() WHERE id_stickers=$this->id_stickers";
                $save=$this->db->query($query);
                if ($save==true) {
                    return true;
                }else {
                    
                    return false;
                }   
            }
            public function saveLaboratorio()
            {
                $query="UPDATE registro_trabajos SET orden_pedido='$this->orden_pedido',fecha_labotario='$this->fecha_labotario',estado='Recibido en Laboratorio',updated_at=CURDATE() WHERE id_stickers=$this->id_stickers";
                $save=$this->db->query($query);
                if ($save==true) {
                    return true;
                }else {
                    
                    return false;
                }   
            }
            
            public function saveSalida()
            {
                $query="UPDATE registro_trabajos SET fecha_salida='$this->fecha_salida',hora_salida='$this->hora_salida',estado='Salida de LESA',updated_at=CURDATE() WHERE id_stickers=$this->id_stickers";
                $save=$this->db->query($query);
                if ($save==true) {
                    return true;
                }else {
                    
                    return false;
                }   
            }
            public function selectAll(){
                $query="SELECT rt.*,sg.stickers,r.ruta,u.nombre,c.cliente,su.sucursal FROM registro_trabajos rt 
                INNER JOIN sticker_generado sg ON sg.id_generado = rt.id_generado
                INNER JOIN stickers s ON sg.id_sticker = s.id_stickers
                INNER JOIN ruta r on r.id_ruta = s.id_ruta 
                INNER JOIN usuario u ON u.id_usuario = r.id_usuario 
                INNER JOIN sucursal su ON su.id_sucursal = rt.id_sucursal 
                INNER JOIN cliente c ON c.id_cliente = su.id_cliente;";
                $selectall=$this->db->query($query);
                $ListRegistros=$selectall->fetch_all(MYSQLI_ASSOC);
                return $ListRegistros;
            }
            public function selectCantidaEstado($tipo){
                $query="";
                if ($tipo=='Mensajero') {
                    $query= "SELECT COUNT(id_registro) AS cantidad FROM registro_trabajos WHERE estado='Recibido por mensajero';";
                }elseif ($tipo=='Recepcion') {
                    $query= "SELECT COUNT(id_registro) AS cantidad FROM registro_trabajos WHERE estado='Recibido por recepcion';";
                }elseif ($tipo=='Laboratorio') {
                    $query= "SELECT COUNT(id_registro) AS cantidad FROM registro_trabajos WHERE estado='Recibido por Laboratorio';";
                }else{
                    $query= "SELECT COUNT(id_registro) AS cantidad FROM registro_trabajos WHERE estado='Enviado';";
                }
                $selectall=$this->db->query($query);
                $ListRegistros=$selectall->fetch_all(MYSQLI_ASSOC);
                return $ListRegistros;
            }
            //---------------------------------------------------------------------------------------------------------------------------------------------//
            public function saveIndependiente()
            {
                $query="INSERT INTO registro_trabajos(id_generado,fecha_recibido,hora_recibido,estado,id_sucursal) VALUES($this->id_stickers,'$this->fecha_recibido','$this->hora_recibido','Recibido por recepcion',$this->id_sucursal);";
                $save=$this->db->query($query);
                if ($save==true) {
                    return true;
                }else {
                    
                    $_SESSION['mensaje']= $this->db->error;
                    return false;
                }   
            }
            public function saveLND($stickers)
            {
                $query="INSERT INTO registro_trabajos(sticker,fecha_recibido,hora_recibido,estado,id_sucursal) VALUES($stickers,'$this->fecha_recibido','$this->hora_recibido','Recibido por recepcion',$this->id_sucursal);";
                $save=$this->db->query($query);
                if ($save==true) {
                    return true;
                }else {
                    
                    $_SESSION['mensaje']= $this->db->error;
                    return false;
                }   
            }
            public function saveLND_Mensajero($stickers,$id_usuario)
            {
                $query="INSERT INTO registro_trabajos(sticker,fecha_mensajero,hora_mensajero,estado,id_sucursal,id_usuario) VALUES($stickers,'$this->fecha_mensajero','$this->hora_mensajero','Recibido por mensajero',$this->id_sucursal,$id_usuario);";
                $save=$this->db->query($query);
                if ($save==true) {
                    return true;
                }else {
                    
                    $_SESSION['mensaje']= $this->db->error;
                    return false;
                }   
            }

            

        
    }
?>