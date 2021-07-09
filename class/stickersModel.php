<?php 
    require_once "config/conexion.php";
    class Stickers extends Conexion
    {
        
 private $id_stickers;
 private $fecha;
 private $stickers;
 private $created_at;
 private $updated_at;
 private $placa;
 private $id_ruta;

 public function __construct()
	{
		  parent::__construct(); //Llamada al constructor de la clase padre

        $this->id_stickers = "";
        $this->fecha = "";
        $this->stickers = "";
        $this->created_at="";
        $this->updated_at="";
        $this->id_ruta="";
    }



	public function getId_stickers() {
        return $this->id_stickers;
    }

    public function setId_stickers($id) {
        $this->id_stickers = $id;
    }
    
    public function getFecha() {
        return $this->fecha;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function getStickers() {
        return $this->stickers;
    }

    public function setStickers($stickers) {
        $this->stickers = $stickers;
    }

    public function getCreated_at() {
        return $this->created_at;
    }

    public function setCreated_at($created_at) {
        $this->created_at = $created_at;
    }

    public function getId_ruta() {
        return $this->id_ruta;
    }

    public function setId_ruta($id_ruta) {
        $this->id_ruta = $id_ruta;
    }
    
    public function getUpdated_at() {
        return $this->updated_at;
    }

    public function setUpdated_at($updated_at) {
        $this->updated_at = $updated_at;
    }
    //--------------------------------------------------------------------------//
    public function save()
  {

    $ruta="";
    $horario="";
    $lastStickers=0;
    //----------- crear numero de sticker ----------------------------------------//
    $queryRuta="SELECT * FROM ruta WHERE id_ruta=$this->id_ruta";
    $selectall=$this->db->query($queryRuta);
    $ListRuta=$selectall->fetch_all(MYSQLI_ASSOC);
    foreach ($ListRuta as $key) {
        $ruta=$key['ruta'];
    }
    //----------------------------------------------------------------------------//
    $queryHorario="SELECT * FROM horario WHERE id_ruta=$this->id_horario";
    $selectall=$this->db->query($queryHorario);
    $ListHorario=$selectall->fetch_all(MYSQLI_ASSOC);
    foreach ($ListHorario as $key) {
        $horario=$key['horario'];
    }
    //----------------------------------------------------------------------------//
    $queryStickers="SELECT * FROM stickers ORDER BY id DESC LIMIT 1";
    $selectall=$this->db->query($queryStickers);
    $ListStickers=$selectall->fetch_all(MYSQLI_ASSOC);
    foreach ($ListStickers as $key) {
        $lastStickers=$key['id_stickers'];
    }
    $number = $lastStickers+1;
$length = 6;
$correlativo = substr(str_repeat(0, $length).$number, - $length);
$sticker=$ruta.$horario.$correlativo;
    //----------------------------------------------------------------------------//
      $query="INSERT INTO stickers (id_stickers,id_ruta,id_horario,stickers,fecha)
              values(NULL,".$this->id_ruta.",".$this->id_horario.",'".$sticker."','".$this->fecha."');";
      $save=$this->db->query($query);
      if ($save==true) {
          return true;
      }else {
          
          return false;
      }   
  }
  //------------------------------------------------------------------------------------------------------------//

    }
?>