<?php
/*
id_usuario
nombre
placa
telefono
usuario
pass
id_tipo_usuario

*/
require_once "config/conexion.php";
class Usuario extends Conexion
{
 private $id_usuario;
 private $nombre;
 private $usuario;
 private $pass;
 private $telefono;
 private $placa;
 private $id_tipo_usuario;

 public function __construct()
	{
		  parent::__construct(); //Llamada al constructor de la clase padre

        $this->id_usuario = "";
        $this->nombre = "";
        $this->usuario = "";
        $this->pass="";
        $this->telefono="";
        $this->placa="";
        $this->id_tipo_usuario="";
    }



	public function getId_usuario() {
        return $this->id_usuario;
    }

    public function setId_usuario($id) {
        $this->id_usuario = $id;
    }
    
    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function getPass() {
        return $this->pass;
    }

    public function setPass($pass) {
        $password = hash('sha256', $pass);  
        $this->pass = $password;
    }
    public function getPlaca() {
        return $this->placa;
    }

    public function setPlaca($placa) {
        $this->placa = $placa;
    }
    public function getId_tipo_usuario() {
        return $this->id_tipo_usuario;
    }

    public function setId_tipo_usuario($id_tipo_usuario) {
        $this->id_tipo_usuario = $id_tipo_usuario;
    }
    
    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }
  //---------------------Funciones----------------------------//
  public function save()
  {
      $query="INSERT INTO usuario (id_usuario,nombre,usuario,pass,placa,id_tipo_usuario,telefono)
              values(NULL,'".$this->nombre."','".$this->usuario."','".$this->pass."','".$this->placa."','".$this->id_tipo_usuario."','".$this->telefono."');";
      $save=$this->db->query($query);
      if ($save==true) {
          return true;
      }else {
          
          return false;
      }   
  }
   public function update()
  {
      $query="UPDATE usuario SET nombre='".$this->nombre."',usuario='".$this->usuario."',placa=".$this->placa.", telefono='".$this->telefono."' WHERE id_usuario=".$this->id_usuario."";
      $update=$this->db->query($query);
      if ($update==true) {
          return true;
      }else {
          return false;
      }  
  }

  public function delete()
  {
     $query="DELETE FROM usuario WHERE id_usuario='".$this->id_usuario."'"; 
     $delete=$this->db->query($query);
     if ($delete == true) {
      return true;
     }else{
      return false;
     }

  }
  public function selectALL()
  {
      $query="SELECT u.*, tu.tipo_usuario  FROM usuario u, tipo_usuario tu WHERE u.id_tipo_usuario = tu.id_tipo_usuario";
      $selectall=$this->db->query($query);
      $ListUsuarios=$selectall->fetch_all(MYSQLI_ASSOC);
      return $ListUsuarios;
  }
  
  public function selectOne($codigo)
  {
      $query="SELECT * FROM usuario WHERE id_usuario=".$codigo."";
      $selectall=$this->db->query($query);
      $ListUsuario=$selectall->fetch_all(MYSQLI_ASSOC);
      return $ListUsuario;
  }
  public function login(){
      $query1="SELECT u.*, tu.tipo_usuario as tipo FROM usuario u INNER JOIN tipo_usuario tu ON tu.id_tipo_usuario=u.id_tipo_usuario WHERE u.usuario='".$this->usuario."' AND u.pass='".$this->pass."'";
      $selectall1=$this->db->query($query1);
      $ListUsuario=$selectall1->fetch_all(MYSQLI_ASSOC);

      if ($selectall1->num_rows!=0) {
          foreach ($ListUsuario as $key) {
              session_start();
              $_SESSION['logged-in'] = true;
              $_SESSION['Usuario']= $key['usuario'];
              $_SESSION['id_usuario']=$key['id_usuario'];
              $_SESSION['tipo']=$key['tipo'];
              $_SESSION['tiempo']=time();
          }
           return true;
      }else{
          session_start();
              $_SESSION['logged-in'] = false;
               $_SESSION['tiempo']=0;
              return false;
          }
          
      }
      //------------------------------------------------------------------//
      public function selectTipoUsuario($codigo)
      {
          $query="SELECT * FROM tipo_usuario";
          $selectall=$this->db->query($query);
          $ListUsuario=$selectall->fetch_all(MYSQLI_ASSOC);
          return $ListUsuario;
      }
 }
?>