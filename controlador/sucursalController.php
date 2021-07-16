<?php 
require_once "../class/sucursalModel.php";
$accion=$_GET['accion'];

if ($accion=='guardar') {
    if (isset($_POST['sucursal'])) {
        $sucursal=$_POST['sucursal'];
    }else{
        $sucursal=NULL;
    }
    if (isset($_POST['direccion'])) {
        $direccion=$_POST['direccion'];
    }else{
        $direccion=NULL;
    }
    if (isset($_POST['id_cliente'])) {
        $id_cliente=$_POST['id_cliente'];
    }else{
        $id_cliente=NULL;
    }
    if (isset($_POST['nombre_contacto'])) {
        $nombre_contacto=$_POST['nombre_contacto'];
    }else{
        $nombre_contacto=NULL;
    }
    if (isset($_POST['telefono'])) {
        $telefono=$_POST['telefono'];
    }else{
        $telefono=NULL;
    }
    $SucursalModel = new Sucursal();
    $SucursalModel->setSucursal($sucursal);
    $SucursalModel->setDireccion($direccion);
    $SucursalModel->setId_cliente($id_cliente);
    $SucursalModel->setNombre_contacto($nombre_contacto);
    $SucursalModel->setTelefono($telefono);
    $save =$SucursalModel->save();
   
       if ($save==TRUE) {
       $informacion = [
           "tittle" => "Correcto",
           "text" => "Sucursal ".$_POST['sucursal'].' guardado con exito',
           "type" => "success",
           "url" => "sucursales.php"
         ];
         echo json_encode($informacion);
       }else{
           //header('Location: ../list/Sucursalrios.php?error=incorrecto');
                       $informacion = [
                           "tittle" => "Error",
                           "text" => "No fue posible guardar el Sucursal, por favor verifique los datos y vuelva a intentarlo",
                           "type" => "error",
                         ];
                         echo json_encode($informacion);
       }
}else if ($accion=='eliminar') {
    $id_Sucursal=$_POST['id_Sucursal'];
    $SucursalModel = new Sucursal();
    $SucursalModel->setId_Sucursal($id_Sucursal);
    $save =$SucursalModel->delete();
   
       if ($save==TRUE) {
       $informacion = [
           "tittle" => "Correcto",
           "text" => "Sucursal ".$_POST['Sucursal'].' ha sido desactivado',
           "type" => "success",
           "url" => "Sucursales.php"
         ];
         echo json_encode($informacion);
       }else{
           //header('Location: ../list/Sucursalrios.php?error=incorrecto');
                       $informacion = [
                           "tittle" => "Error",
                           "text" => "No fue posible guardar el Sucursal, por favor verifique los datos y vuelva a intentarlo",
                           "type" => "error",
                         ];
                         echo json_encode($informacion);
       }
} else if($accion=='modificar'){
    if (isset($_POST['sucursal'])) {
        $sucursal=$_POST['sucursal'];
    }else{
        $nombre=NULL;
    }
    if (isset($_POST['direccion'])) {
        $direccion=$_POST['direccion'];
    }else{
        $direccion=NULL;
    }
    if (isset($_POST['id_cliente'])) {
        $id_cliente=$_POST['id_cliente'];
    }else{
        $id_cliente=NULL;
    }
    if (isset($_POST['nombre_contacto'])) {
        $nombre_contacto=$_POST['nombre_contacto'];
    }else{
        $nombre_contacto=NULL;
    }
    if (isset($_POST['telefono'])) {
        $telefono=$_POST['telefono'];
    }else{
        $telefono=NULL;
    }
    $SucursalModel = new Sucursal();
    $SucursalModel->setSucursal($sucursal);
    $SucursalModel->setId_sucursal($_POST['id_sucursal']);
    $SucursalModel->setDireccion($direccion);
    $SucursalModel->setId_cliente($id_cliente);
    $SucursalModel->setNombre_contacto($nombre_contacto);
    $SucursalModel->setTelefono($telefono);
    $save =$SucursalModel->update();
   
       if ($save==TRUE) {
       $informacion = [
           "tittle" => "Correcto",
           "text" => "Sucursal ".$_POST['Sucursal'].' guardado con exito',
           "type" => "success",
           "url" => "Sucursales.php"
         ];
         echo json_encode($informacion);
       }else{
           //header('Location: ../list/Sucursalrios.php?error=incorrecto');
                       $informacion = [
                           "tittle" => "Error",
                           "text" => "No fue posible guardar el Sucursal, por favor verifique los datos y vuelva a intentarlo",
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