<?php 
    require_once "config/conexion.php";
    class Cliente extends Conexion
    {
                
        private $id_cliente;
        private $cliente;
        private $estado;

        public function __construct()
            {
                parent::__construct(); //Llamada al constructor de la clase padre

                $this->id_cliente = "";
                $this->cliente = "";
                $this->estado = "";
            }
    

	public function getId_cliente() {
        return $this->id_cliente;
    }

    public function setId_cliente($id) {
        $this->id_cliente = $id;
    }
    
    public function getCliente() {
        return $this->cliente;
    }

    public function setCliente($cliente) {
        $this->cliente = $cliente;
    }
    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    //--------------------------------------------------------------------------//
        public function save()
        {
            $query="INSERT INTO `cliente`(`id_cliente`, `cliente`, `estado`) VALUES(NULL,'".$this->cliente."','".$this->estado."');";
            $save=$this->db->query($query);
            if ($save==true) {
                return true;
            }else {
                return false;
            }   
        }

        public function update()
        {
            $query="UPDATE cliente SET cliente='".$this->cliente."', estado='".$this->estado."' WHERE id_cliente='".$this->id_cliente."'";
            $update=$this->db->query($query);
            if ($update==true) {
                return true;
            }else {
                return false;
            }  
        }
        public function delete()
        {
        $query="DELETE FROM cliente WHERE id_cliente='".$this->id_cliente."'"; 
        $delete=$this->db->query($query);
        if ($delete == true) {
            return true;
        }else{
            return false;
        }

        }
        public function selectALL()
        {
            $query="SELECT * FROM cliente";
            $selectall=$this->db->query($query);
            $ListTipoUsuario=$selectall->fetch_all(MYSQLI_ASSOC);
            return $ListTipoUsuario;
        }
        public function selectOne($codigo)
        {
            $query="SELECT * FROM cliente WHERE id_cliente='".$codigo."'";
            $selectall=$this->db->query($query);
        $ListTipoUsuario=$selectall->fetch_all(MYSQLI_ASSOC);
            return $ListTipoUsuario;
        }

    }
?>