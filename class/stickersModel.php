<?php 
    require_once "config/conexion.php";
    class Stickers extends Conexion
    {
        
 private $id_stickers;
 private $fecha;
 private $stickers;
 private $created_at;
 private $updated_at;
 private $id_ruta;
 private $id_horario;
 private $cantidad;


 public function __construct()
	{
		  parent::__construct(); //Llamada al constructor de la clase padre

        $this->id_stickers = "";
        $this->fecha = "";
        $this->stickers = "";
        $this->created_at="";
        $this->updated_at="";
        $this->id_ruta="";
        $this->id_horario="";
        $this->cantidad="";
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
    public function getId_horario() {
        return $this->id_horario;
    }

    public function setId_horario($id_horario) {
        $this->id_horario = $id_horario;
    }
    public function getCantidad() {
        return $this->cantidad;
    }

    public function setCantidad($Cantidad) {
        $this->cantidad = $Cantidad;
    }
    //--------------------------------------------------------------------------//
    public function generate()
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
    $queryHorario="SELECT * FROM horario WHERE id_horario=$this->id_horario";
    $selectall=$this->db->query($queryHorario);
    $ListHorario=$selectall->fetch_all(MYSQLI_ASSOC);
    foreach ($ListHorario as $key) {
        $horario=$key['horario'];
    }
    //----------------------------------------------------------------------------//
    $queryStickers="SELECT * FROM sticker_generado ORDER BY id_generado DESC LIMIT 1";
    $selectall=$this->db->query($queryStickers);
    $ListStickers=$selectall->fetch_all(MYSQLI_ASSOC);
    foreach ($ListStickers as $key) {
        $lastStickers=$key['id_generado'];
    }
    $number = $lastStickers+1;
$length = 6;
$correlativo = substr(str_repeat(0, $length).$number, - $length);
$sticker=$ruta.$horario.$correlativo;
    //----------------------------------------------------------------------------//
      $query="INSERT INTO sticker_generado (id_sticker,stickers,estado)
              values($this->id_stickers,'".$sticker."','Sin Utilizar');";
      $save=$this->db->query($query);
      if ($save==true) {
          return true;
      }else {
          
          return false;
      }   
  }
  //------------------------------------------------------------------------------------------------------------//
  public function selectRutas(){
        $query="SELECT * FROM ruta";
        $selectall=$this->db->query($query);
        $ListUsuario=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListUsuario;
  }
  //------------------------------------------------------------------------------------------------------------//
  public function selectHorarios(){
    $query="SELECT * FROM horario";
    $selectall=$this->db->query($query);
    $ListUsuario=$selectall->fetch_all(MYSQLI_ASSOC);
    return $ListUsuario;
}
  //------------------------------------------------------------------------------------------------------------//
  public function selectAll(){
    $query="SELECT s.*,r.ruta, h.horario FROM stickers s INNER JOIN ruta r ON r.id_ruta =s.id_ruta INNER JOIN horario h ON h.id_horario = s.id_horario ";
    $selectall=$this->db->query($query);
    $ListUsuario=$selectall->fetch_all(MYSQLI_ASSOC);
    return $ListUsuario;
}
  //------------------------------------------------------------------------------------------------------------//
  public function save()
  {
      $query="INSERT INTO `stickers`(`id_stickers`, `id_ruta`, `id_horario`, `fecha`, `cantidad`) VALUES(NULL,$this->id_ruta,$this->id_horario,'$this->fecha',$this->cantidad);";
      $save=$this->db->query($query);
      if ($save==true) {
          return true;
      }else {
          return false;
      }   
  }
  //------------------------------------------------------------------------------------------------------------//
  public function selectOne($codigo){
    $query="SELECT * FROM stickers WHERE id_stickers=$codigo";
    $selectall=$this->db->query($query);
    $ListUsuario=$selectall->fetch_all(MYSQLI_ASSOC);
    return $ListUsuario;
}
  //------------------------------------------------------------------------------------------------------------//
  public function selectAllGenerados($sticker){
    $query="SELECT g.*,r.ruta, h.horario, s.fecha FROM sticker_generado g INNER JOIN stickers s on s.id_stickers = g.id_sticker INNER JOIN ruta r ON r.id_ruta =s.id_ruta INNER JOIN horario h ON h.id_horario = s.id_horario WHERE g.id_sticker=$sticker";
    $selectall=$this->db->query($query);
    $ListUsuario=$selectall->fetch_all(MYSQLI_ASSOC);
    return $ListUsuario;
}
  //-----------------------------------------------------------------------------------------------------------------//
    }
?>