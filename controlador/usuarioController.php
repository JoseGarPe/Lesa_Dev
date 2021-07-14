<?php 
require_once "../class/usuarioModel.php";
$accion=$_GET['accion'];
/*
id_usuario
nombre
placa
telefono
usuario
pass
id_tipo_usuario

*/
if ($accion=='guardar') {
 if (isset($_POST['nombre'])) {
 	$nombre=$_POST['nombre'];
 }else{
 	$nombre=NULL;
 }
 if (isset($_POST['usuario'])) {
 	$usuario=$_POST['usuario'];
 }else{
 	$usuario=NULL;
 }
  if (isset($_POST['pass'])) {
 	$pass=$_POST['pass'];
 }else{
 	$pass=NULL;
 }

 if (isset($_POST['placa'])) {
	$placa=$_POST['placa'];
}else{
	$placa=NULL;
}

  if (isset($_POST['id_tipo_usuario'])) {
 	$id_tipo_usuario=$_POST['id_tipo_usuario'];
 }else{
 	$id_tipo_usuario=NULL;
 }
 $estado=1;
 
 $usua = new Usuario();
 $usua->setNombre($nombre);
 $usua->setUsuario($usuario);
 $usua->setPass($pass);
 $usua->setPlaca($placa);
 $usua->setId_tipo_usuario($id_tipo_usuario);
 $usua->setTelefono($estado);
 $save =$usua->save();

	if ($save==TRUE) {
	//	header('Location: ../list/Usuarios.php?success=correcto');
	$informacion = [
		"tittle" => "Correcto",
		"text" => "Usuario ".$_POST['nombre'].' guardado con exito',
		"type" => "success",
		"url" => "usuarios.php"
	  ];
      echo json_encode($informacion);
	}else{
		//header('Location: ../list/Usuarios.php?error=incorrecto');
	    			$informacion = [
						"tittle" => "Error",
						"text" => "No fue posible guardar el usuario, por favor verifique los datos y vuelva a intentarlo",
						"type" => "error",
					  ];
					  echo json_encode($informacion);
	}
}
elseif ($accion=='eliminar') {
    $id_usuario=$_POST['id_usuario'];
    $usua = new Usuario();
    $usua->setId_usuario($id_usuario);
    $delete= $usua->delete();
    if ($delete==TRUE) {
		$informacion = [
			"tittle" => "Correcto",
			"text" => 'Usuario  Eliminado con exito',
			"type" => "success",
			"url" => "usuarios.php"
		  ];
		  echo json_encode($informacion);
		}else{
			//header('Location: ../list/Usuarios.php?error=incorrecto');
						$informacion = [
							"tittle" => "Error",
							"text" => "No fue posible Eliminar el usuario, por favor verifique los datos y vuelva a intentarlo",
							"type" => "error",
						  ];
						  echo json_encode($informacion);
		}
}
elseif ($accion=='status') {
	$id_usuario=$_POST['id_usuario'];
	if (isset($_POST['estado'])) {
		$estado=$_POST['estado'];
	}else{
		$estado=2;
	}
 $usua = new Usuario();
 $usua->setId_usuario($id_usuario);
 $usua->setTelefono($estado);
 $delete= $usua-> updateStatus();
 if ($delete==TRUE) {
		header('Location: ../list/Usuarios.php?success=correcto');
	}

}
elseif($accion=="modificar") {
    if (isset($_POST['nombre'])) {
		$nombre=$_POST['nombre'];
	}else{
		$nombre=NULL;
	}
	if (isset($_POST['usuario'])) {
		$usuario=$_POST['usuario'];
	}else{
		$usuario=NULL;
	} 
	if (isset($_POST['placa'])) {
		$placa=$_POST['placa'];
	}else{
		$usuario=NULL;
	} 
	 if (isset($_POST['id_tipo_usuario'])) {
		$id_tipo_usuario=$_POST['id_tipo_usuario'];
	}else{
		$id_tipo_usuario=3;
	}
   
    $usua = new Usuario();
    $usua->setNombre($nombre);
    $usua->setUsuario($usuario);
    $usua->setPlaca($placa);
    $usua->setId_tipo_usuario($id_tipo_usuario);
    $usua->setId_usuario($_POST['id_usuario']);
    $usua->setTelefono($estado);
	$update=$usua->update();
	if ($update==true) {
		$informacion = [
			"tittle" => "Correcto",
			"text" => "Usuario ".$_POST['nombre'].' actualizado con exito',
			"type" => "success",
			"url" => "usuarios.php"
		  ];
		  
		  echo json_encode($informacion);

	}else{
	    			$informacion = [
						"tittle" => "Error",
						"text" => "No fue posible actualizar el usuario, por favor verifique los datos y vuelva a intentarlo",
						"type" => "error",
					  ];
					  echo json_encode($informacion);  

	}
}
elseif($accion=='login') {
	if (isset($_POST['usuario'])) {
		$usuario=$_POST['usuario'];
		if (isset($_POST['pass'])) {
			$pass=$_POST['pass'];
			$usua = new Usuario();
			$usua->setUsuario($usuario);
			$usua->setpass($pass);
			$login=$usua->login();
			if ($login==true) {
				$informacion = [
					"tittle" => "Correcto",
					"text" => "Bienvenido",
					"type" => "success",
					"url" => "index.php"
				];
				echo json_encode($informacion);
			}else{
							$informacion = [
								"tittle" => "Error",
								"text" => "Usuario $usuario no registrado, por favor registrate o intenta de nuevo.",
								"type" => "error",
							];
				echo json_encode($informacion);  
			}
		}else{
			$informacion = [
				"tittle" => "Error",
				"text" => "Contraseña invalida",
				"type" => "error",
			  ];
			  echo json_encode($informacion);  
		}	
	}else{
		$informacion = [
			"tittle" => "Error",
			"text" => "Es necesario un placa electronico para poder ingresar",
			"type" => "error",
		  ];
		  echo json_encode($informacion);  
	}	
}
elseif ($accion=='logout') {
	session_start();
	session_destroy();
	//llenamos la sesion logged-in como false
	session_start();
	$_SESSION['logged-in']=false;

	$informacion = [
		"tittle" => "Correcto",
		"text" => "Hasta la proxima",
		"type" => "success",
		"url" => "login.php"
	];
	echo json_encode($informacion);
}
 ?>
