<?php 
require_once "../class/clienteModel.php";
$accion=$_GET['accion'];

if ($accion=='guardar') {
    if (isset($_POST['cliente'])) {
        $cliente=$_POST['cliente'];
    }else{
        $nombre=NULL;
    }
    $clienteModel = new Cliente();
    $clienteModel->setCliente($cliente);
    $save =$clienteModel->save();
   
       if ($save==TRUE) {
       $informacion = [
           "tittle" => "Correcto",
           "text" => "cliente ".$_POST['cliente'].' guardado con exito',
           "type" => "success",
           "url" => "clientes.php"
         ];
         echo json_encode($informacion);
       }else{
           //header('Location: ../list/clienterios.php?error=incorrecto');
                       $informacion = [
                           "tittle" => "Error",
                           "text" => "No fue posible guardar el cliente, por favor verifique los datos y vuelva a intentarlo",
                           "type" => "error",
                         ];
                         echo json_encode($informacion);
       }
}else if ($accion=='eliminar') {
    $id_cliente=$_POST['id_cliente'];
    $estado='Desactivado';
    $clienteModel = new Cliente();
    $clienteModel->setId_cliente($id_cliente);
    $clienteModel->setEstado($estado);
    $save =$clienteModel->delete();
   
       if ($save==TRUE) {
       $informacion = [
           "tittle" => "Correcto",
           "text" => "cliente ".$_POST['cliente'].' ha sido desactivado',
           "type" => "success",
           "url" => "clientes.php"
         ];
         echo json_encode($informacion);
       }else{
           //header('Location: ../list/clienterios.php?error=incorrecto');
                       $informacion = [
                           "tittle" => "Error",
                           "text" => "No fue posible guardar el cliente, por favor verifique los datos y vuelva a intentarlo",
                           "type" => "error",
                         ];
                         echo json_encode($informacion);
       }
} else if($accion=='modificar'){
    if (isset($_POST['cliente'])) {
        $cliente=$_POST['cliente'];
    }else{
        $nombre=NULL;
    }
    $clienteModel = new Cliente();
    $clienteModel->setCliente($cliente);
    $clienteModel->setId_cliente($_POST['id_cliente']);
    $save =$clienteModel->update();
   
       if ($save==TRUE) {
       $informacion = [
           "tittle" => "Correcto",
           "text" => "cliente ".$_POST['cliente'].' guardado con exito',
           "type" => "success",
           "url" => "clientes.php"
         ];
         echo json_encode($informacion);
       }else{
           //header('Location: ../list/clienterios.php?error=incorrecto');
                       $informacion = [
                           "tittle" => "Error",
                           "text" => "No fue posible guardar el cliente, por favor verifique los datos y vuelva a intentarlo",
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