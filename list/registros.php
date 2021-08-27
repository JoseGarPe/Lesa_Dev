<?php
//--------------------------------------------//
session_start();
if (!isset($_SESSION['logged-in']) || $_SESSION['logged-in']==false ) {
  header('Location: ../login.php');
}
require_once "../class/registroModel.php";
$Registro = new Registro();
$ListUsua = $Registro->selectALL();

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sistema de control de mensajeria</title>

  <!-- Custom fonts for this template -->
  <link href="../src/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../src/css/sb-admin-2.min.css" rel="stylesheet">
  
  <link href="../src/css/sweetalert2.css" rel="stylesheet" />

  <!-- Custom styles for this page -->
  <link href="../src/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <script src="../src/vendor/jquery/jquery.min.js"></script>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
   
    <?php include_once 'menu.php';?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

      <?php include_once 'headerTemplate.php';?>
     
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Control de trabajos LESA</h1>
          <p class="mb-4">Administracion de Registro, Creacion y modificacion</p>

          <!-- cartas presentacion -->
           <!-- Content Row -->
           <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">En Mensajero</div>
                        <div id="mensajero" class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                        </div>
                        <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    </div>
                </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">En Recepcion</div>
                        <div id="recepcion" class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                        </div>
                        <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    </div>
                </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">En Laboratorio</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                            <div id="lab" class="h5 mb-0 mr-3 font-weight-bold text-gray-800">0</div>
                            </div>
                        </div>
                        </div>
                        <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    </div>
                </div>
                </div>

                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Finalizados</div>
                        <div id="salida" class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                        </div>
                        <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
          <!-- -------------------- -->
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Registros Existentes</h6>
            </br>
              <a href="saveMensajero.php" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                    <i class="fas fa-motorcycle"></i>
                    </span>
                    <span class="text">Crear Nueva Orden desde Mensajero</span>
                  </a>
              <a href="saveRecepcion.php" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                    <i class="fas fa-archive"></i>
                    </span>
                    <span class="text">Crear Nueva Orden directa en Recepción</span>
                  </a>
            </div>
            <div class="card-body">
              
              <!-- tabla de Registro -->

              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Sticker</th>
                      <th>Optica</th>
                      <th>Sucursal</th>
                      <th>Mensajero</th>
                      <th>Estado</th>
                      <th>Fecha Mensajero</th>
                      <th>Fecha Recepcion</th>
                      <th>Fecha Laboratorio</th>
                      <th>Fecha Enviado</th>
                      <th>Editar</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php

                    foreach ($ListUsua as $dato) {
                      ?>

                      <tr>
                      <td> <?php echo $dato['id_registro']; ?> </td>
                      <td> <?php echo $dato['stickers']; ?> </td>
                      <td><?php echo $dato['cliente']; ?></td>
                      <td><?php echo $dato['sucursal']; ?> </td>
                      <td><?php echo $dato['nombre']; ?></td>
                      <td><?php echo $dato['estado']; ?></td>
                      <td><?php echo $dato['fecha_mensajero'].' '.$dato['hora_mensajero']; ?></td>
                      <td><?php echo $dato['fecha_recibido'].' '.$dato['hora_recibido']; ?></td>
                      <td><?php echo $dato['fecha_laboratorio']; ?></td>
                      <td><?php echo $dato['fecha_salida'].' '.$dato['hora_salida']; ?></td>
                      <td><input type="button" name="edit" value="Editar" id_usuario="<?php echo $dato["id_registro"]?>" class="btn btn-warning update_data" /></td>
                                      
                    </tr>

                      <?php
                    }

                    ?>      
                  </tbody>
                </table>
              </div>

              <!-- fin Tabla de Registro -->




            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Sistema de Monitoreo y Seguimiento 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
 
<?php include_once 'logout.php'?>
  <!-- Modal agregar Registro -->
<?php include_once '../views/Registro/saveRegistro.php'?>

<div id="dataModal3" class="modal fade">  
                                  <div class="modal-dialog">  
                                       <div class="modal-content">  
                                            <div class="modal-header">  
                                            </div>  
                                            <div class="modal-body" id="employee_forms3">  

                                            </div>  
                                            <div class="modal-footer">  
                                                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                                            </div>  
                                       </div>  
                                  </div>  
</div>
  <!-- Modal modificar Registro -->

  <!-- Modal eliminar Registro -->


  <!-- Bootstrap core JavaScript-->
  <script src="../src/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../src/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../src/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../src/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../src/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../src/js/demo/datatables-demo.js"></script>
   <script src="../src/js/sweetalert2.min.js"></script>
   <script src="../src/js/sweetAlert2.js"></script>
<script>
 $(document).ready(function(){  
      //-------------------------------------------------------//
      CantidadMensajero();
      CantidadRecepcion();
      //------------------------------------------------------//
      $(document).on('click', '.update_data', function(){  
          var id_usuario = $(this).attr("id_usuario");  
           if(id_usuario != '')  
           {  
                $.ajax({  
                     url:"../views/Registro/updateRegistro.php",  
                     method:"POST",  
                     data:{id_usuario:id_usuario},  
                     success:function(data){  
                          $('#employee_forms3').html(data);  
                          $('#dataModal3').modal('show');  
                     }  
                });  
           }   
      }); 
      //------------------------------------------------------------//
      $(document).on('click', '.delete_data', function(){  
          var id_usuario = $(this).attr("id_usuario");  
           if(id_usuario != '')  
           {  
                $.ajax({  
                     url:"../views/Registro/deleteRegistro.php",  
                     method:"POST",  
                     data:{id_usuario:id_usuario},  
                     success:function(data){  
                          $('#employee_forms3').html(data);  
                          $('#dataModal3').modal('show');  
                     }  
                });  
           }   
      }); 
      //-----------------------------------------------------------/
      function CantidadMensajero() {
        var tipo = 'Mensajero';
        $.ajax({  
                     url:"../controlador/registroController.php?accion=cantidad",  
                     method:"POST",  
                     data:{tipo:tipo},  
                     success:function(data){  
                       $('#mensajero').html(data);
                     }  
                });  
      }
      //------------------------------------------------------------//
      function CantidadRecepcion() {
        var tipo = 'Recepcion';
        $.ajax({  
                     url:"../controlador/registroController.php?accion=cantidad",  
                     method:"POST",  
                     data:{tipo:tipo},  
                     success:function(data){  
                       $('#recepcion').html(data);
                     }  
                });  
      }
    });
</script>
</body>

</html>
