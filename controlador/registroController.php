<?php
 require_once "../class/registroModel.php";
 require_once "../class/sucursalModel.php";
 $accion=$_GET['accion'];
 if ($accion=='paso1') {
    if (isset($_POST['sticker'])) {
        $sticker=$_POST['sticker'];
    }else{
        $sticker=NULL;
    }
    if (isset($_POST['fecha_mensajero'])) {
        $fecha_mensajero=$_POST['fecha_mensajero'];
    }else{
        $fecha_mensajero=NULL;
    }
    if (isset($_POST['hora_mensajero'])) {
        $hora_mensajero=$_POST['hora_mensajero'];
    }else{
        $hora_mensajero=NULL;
    }
    if (isset($_POST['id_sucursal'])) {
        $id_sucursal=$_POST['id_sucursal'];
    }else{
        $id_sucursal=NULL;
    }
    $RegistroModel = new Registro();
    $RegistroModel->setSticker($sticker);
    $RegistroModel->setFecha_mensajero($fecha_mensajero);
    $RegistroModel->setHora_mensajero($hora_mensajero);
    $RegistroModel->setId_sucursal($id_sucursal);
   $save =$RegistroModel->saveMensajero(); 
   
       if ($save==TRUE) {
       $informacion = [
           "tittle" => "Correcto",
           "text" => "Registro ".$_POST['sticker'].' guardado con exito',
           "type" => "success",
           "url" => "registros.php"
         ];
         echo json_encode($informacion);
       }else{
           //header('Location: ../list/Registrorios.php?error=incorrecto');
                       $informacion = [
                           "tittle" => "Error",
                           "text" => "No fue posible guardar el Registro, por favor verifique los datos y vuelva a intentarlo",
                           "type" => "error",
                         ];
                         echo json_encode($informacion);
       }
}else if($accion=='sucursales'){
    $id_cliente=$_POST['id_cliente'];
    $sucursales='';
    $sucursal = new Sucursal();
    $listSucursales = $sucursal->selectALLOneCliente($id_cliente);
    foreach ($listSucursales as $dataCliente) {
        $sucursales.='<option data-tokens="'.$dataCliente['sucursal'].'" value="'.$dataCliente['id_sucursal'].'">'.$dataCliente['sucursal'].'</option>';
    }
    echo $sucursales;
}else if($accion=='cantidad'){
    $tipo=$_POST['tipo'];
    $respuesta='';
    $registro = new Registro();
    $listRegistro = $registro->selectCantidaEstado($tipo);
    foreach ($listRegistro as $dataRegistro) {
        $respuesta = $dataRegistro['cantidad'];
    }
    echo $respuesta;
}
?>
