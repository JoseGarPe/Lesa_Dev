<?php
//--------------------------------------------//
session_start();
if (!isset($_SESSION['logged-in']) || $_SESSION['logged-in']==false ) {
  header('Location: ../login.php');
}
require_once "../class/usuarioModel.php";
$Usuarios = new Usuario();
$ListUsua = $Usuarios->selectALL();

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
          <h1 class="h3 mb-2 text-gray-800">Mantenimiento Usuarios</h1>
          <p class="mb-4">Administracion de Usuarios, Creacion y modificacion</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Usuarios Existentes</h6>
            </br>
              <a href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#staticBackdrop">
                    <span class="icon text-white-50">
                      <i class="fas fa-user"></i>
                    </span>
                    <span class="text">Agregar Usuarios</span>
                  </a>
            </div>
            <div class="card-body">
              
              <!-- tabla de usuarios -->

              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Username</th>
                      <th>Telefono</th>
                      <th>Acceso</th>
                      <th>Ruta</th>
                      <th>Estado</th>
                      <th>Editar</th>
                      <th>Eliminar</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php

                    foreach ($ListUsua as $dato) {
                      ?>

                      <tr>
                      <td> <?php echo $dato['id_usuario']; ?> </td>
                      <td> <?php echo $dato['nombre']; ?> </td>
                      <td><?php echo $dato['usuario']; ?></td>
                      <td><?php echo $dato['telefono']; ?> </td>
                      <td><?php echo $dato['tipo_usuario']; ?></td>
                      <td><?php
                      if ($dato['tipo_usuario']=='Mensajero') {
                        $ListRuta = $Usuarios->selectRuta($dato['id_usuario']);
                        foreach ($ListRuta as $key) {
                          echo $key['ruta'];
                        }
                      }else{
                        echo 'N/D';
                      }
                      
                      ?></td>
                      <td><?php echo $dato['estado']; ?></td>
                      <td><input type="button" name="edit" value="Editar" id_usuario="<?php echo $dato["id_usuario"]?>" class="btn btn-warning update_data" /></td>
                      <td>
                         <div class="btn-toolbar" role="toolbar">
                          <button type="button"  name="edit" value="Eliminar" id_usuario="<?php echo $dato["id_usuario"]?>" class=" btn btn-danger delete_data" ><i class="fas fa-trash-alt"></i></button>
                         </div>
                      </td>
                      
                    </tr>

                      <?php
                    }

                    ?>      
                  </tbody>
                </table>
              </div>

              <!-- fin Tabla de Usuarios -->




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
  <!-- Modal agregar usuarios -->
<?php include_once '../views/Usuarios/saveUsuarios.php'?>

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
  <!-- Modal modificar usuarios -->

  <!-- Modal eliminar usuarios -->


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
      //------------------------------------------------------//
      $(document).on('click', '.update_data', function(){  
          var id_usuario = $(this).attr("id_usuario");  
           if(id_usuario != '')  
           {  
                $.ajax({  
                     url:"../views/Usuarios/updateUsuarios.php",  
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
                     url:"../views/Usuarios/deleteUsuarios.php",  
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
    });
</script>
</body>

</html>
