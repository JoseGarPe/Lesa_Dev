<?php 
    require_once "config/conexion.php";
    class Sucursal extends Conexion
    {
                
        private $id_sucursal;
        private $sucursal;
        private $direccion;
        private $id_cliente;

        public function __construct()
            {
                parent::__construct(); //Llamada al constructor de la clase padre

                $this->id_sucursal = "";
                $this->sucursal = "";
                $this->direccion = "";
                $this->id_cliente = "";
            }
    

	public function getId_sucursal() {
        return $this->id_sucursal;
    }

    public function setId_sucursal($id) {
        $this->id_sucursal = $id;
    }
    
    public function getSucursal() {
        return $this->sucursal;
    }

    public function setSucursal($sucursal) {
        $this->sucursal = $sucursal;
    }
    public function getDireccion() {
        return $this->direccion;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }
    public function getId_cliente() {
        return $this->id_cliente;
    }

    public function setId_cliente($id) {
        $this->id_cliente = $id;
    }

    //--------------------------------------------------------------------------//
        public function save()
        {
            $query="INSERT INTO `sucursal`(`id_sucursal`, `sucursal`, `direccion`, `id_cliente`) VALUES(NULL,'".$this->sucursal."','".$this->direccion."','".$this->id_cliente."');";
            $save=$this->db->query($query);
            if ($save==true) {
                return true;
            }else {
                return false;
            }   
        }

        public function update()
        {
            $query="UPDATE sucursal SET sucursal='".$this->sucursal."', direccion='".$this->direccion."',id_cliente='".$this->id_cliente."' WHERE id_sucursal='".$this->id_sucursal."'";
            $update=$this->db->query($query);
            if ($update==true) {
                return true;
            }else {
                return false;
            }  
        }
        public function delete()
        {
        $query="DELETE FROM sucursal WHERE id_sucursal='".$this->id_sucursal."'"; 
        $delete=$this->db->query($query);
        if ($delete == true) {
            return true;
        }else{
            return false;
        }

        }
        public function selectALL()
        {
            $query="SELECT * FROM sucursal";
            $selectall=$this->db->query($query);
            $ListTipoUsuario=$selectall->fetch_all(MYSQLI_ASSOC);
            return $ListTipoUsuario;
        }
        public function selectOne($codigo)
        {
            $query="SELECT * FROM sucursal WHERE id_sucursal='".$codigo."'";
            $selectall=$this->db->query($query);
        $ListTipoUsuario=$selectall->fetch_all(MYSQLI_ASSOC);
            return $ListTipoUsuario;
        }

    }
?>