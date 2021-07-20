<?php 
require_once "../class/stickersModel.php";
$accion=$_GET['accion'];

if ($accion=='guardar') {
   
    if (isset($_POST['id_ruta'])) {
        $id_ruta=$_POST['id_ruta'];
    }else{
        $id_ruta=NULL;
    }
    if (isset($_POST['id_horario'])) {
        $id_horario=$_POST['id_horario'];
    }else{
        $id_horario=NULL;
    }
    if (isset($_POST['fecha'])) {
        $fecha=$_POST['fecha'];
    }else{
        $fecha=NULL;
    }
    if (isset($_POST['cantidad'])) {
        $cantidad=$_POST['cantidad'];
    }else{
        $cantidad=1;
    }

    $stickersModel = new Stickers();
    $stickersModel->setId_ruta($id_ruta);
    $stickersModel->setId_horario($id_horario);
    $stickersModel->setFecha($fecha);
    $stickersModel->setCantidad($cantidad);
     $save =$stickersModel->save();
      if ($save==TRUE) {
       $informacion = [
           "tittle" => "Correcto",
           "text" => " ".$_POST['cantidad'].' stickers guardado con exito',
           "type" => "success",
           "url" => "encabezadoStickers.php"
         ];
         echo json_encode($informacion);
       }else{
           //header('Location: ../list/stickersrios.php?error=incorrecto');
                       $informacion = [
                           "tittle" => "Error",
                           "text" => "No fue posible guardar el stickers, por favor verifique los datos y vuelva a intentarlo",
                           "type" => "error",
                         ];
                         echo json_encode($informacion);
       }
}else if ($accion=='eliminar') {
    $id_stickers=$_POST['id_stickers'];
    $stickersModel = new Stickers();
    $stickersModel->setId_stickers($id_stickers);
    $save =$stickersModel->delete();
   
       if ($save==TRUE) {
       $informacion = [
           "tittle" => "Correcto",
           "text" => "stickers ".$_POST['stickers'].' ha sido desactivado',
           "type" => "success",
           "url" => "stickers.php"
         ];
         echo json_encode($informacion);
       }else{
           //header('Location: ../list/stickersrios.php?error=incorrecto');
                       $informacion = [
                           "tittle" => "Error",
                           "text" => "No fue posible guardar el stickers, por favor verifique los datos y vuelva a intentarlo",
                           "type" => "error",
                         ];
                         echo json_encode($informacion);
       }
} else if($accion=='modificar'){
    if (isset($_POST['stickers'])) {
        $stickers=$_POST['stickers'];
    }else{
        $nombre=NULL;
    }
    if (isset($_POST['id_ruta'])) {
        $id_ruta=$_POST['id_ruta'];
    }else{
        $id_ruta=NULL;
    }
    if (isset($_POST['id_horario'])) {
        $id_horario=$_POST['id_horario'];
    }else{
        $id_horario=NULL;
    }
    if (isset($_POST['fecha'])) {
        $fecha=$_POST['fecha'];
    }else{
        $fecha=NULL;
    }
    if (isset($_POST['telefono'])) {
        $telefono=$_POST['telefono'];
    }else{
        $telefono=NULL;
    }
    $stickersModel = new Stickers();
    $stickersModel->setstickers($stickers);
    $stickersModel->setId_stickers($_POST['id_stickers']);
    $stickersModel->setId_ruta($id_ruta);
    $stickersModel->setId_horario($id_horario);
    $stickersModel->setFecha($fecha);
    $save =$stickersModel->update();
   
       if ($save==TRUE) {
       $informacion = [
           "tittle" => "Correcto",
           "text" => "stickers ".$_POST['stickers'].' guardado con exito',
           "type" => "success",
           "url" => "stcikers.php"
         ];
         echo json_encode($informacion);
       }else{
           //header('Location: ../list/stickersrios.php?error=incorrecto');
                       $informacion = [
                           "tittle" => "Error",
                           "text" => "No fue posible guardar el stickers, por favor verifique los datos y vuelva a intentarlo",
                           "type" => "error",
                         ];
                         echo json_encode($informacion);
       }
}
else if($accion=='generar'){
    $cantidad = $_POST['cantidad'];
    $stickersModel = new Stickers();
    $stickersModel->setId_stickers($_POST['id_stickers']);
    $stickersModel->setId_ruta($_POST['id_ruta']);
    $stickersModel->setId_horario($_POST['id_horario']);
    for ($i=0; $i < $cantidad ; $i++) { 
    $save =$stickersModel->generate();
    }
    
   
       if ($save==TRUE) {
       $informacion = [
           "tittle" => "Correcto",
           "text" => $_POST['cantidad'].' stickers  generados con exito',
           "type" => "success",
           "url" => "stickers.php?id?".$_POST['id_stickers']
         ];
         echo json_encode($informacion);
       }else{
           //header('Location: ../list/stickersrios.php?error=incorrecto');
                       $informacion = [
                           "tittle" => "Error",
                           "text" => "No fue posible guardar el stickers, por favor verifique los datos y vuelva a intentarlo",
                           "type" => "error",
                         ];
                         echo json_encode($informacion);
       }
}
else{
    $informacion = [
        "tittle" => "Error",
        "text" => "No fue posible realizar esta accion por favor verifique los datos y vuelva a intentarlo",
        "type" => "error",
      ];
      echo json_encode($informacion);
}

?>