<?php
//--------------------------------------------//
session_start();
if (!isset($_SESSION['logged-in']) || $_SESSION['logged-in']==false ) {
  header('Location: ../login.php');
}
//require_once "../class/sucursalModel.php";

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
          <h1 class="h3 mb-2 text-gray-800">Mantenimiento Sucursales</h1>
          <p class="mb-4">Administracion de Sucursales, Creacion y modificacion</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Sucursales Existentes</h6>
            </br>
              <a href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#staticBackdrop">
                    <span class="icon text-white-50">
                      <i class="fas fa-user"></i>
                    </span>
                    <span class="text">Agregar Sucursales</span>
                  </a>
            </div>
            <div class="card-body">
              
              <!-- tabla de Sucursales -->

                 <form action="post">
                    <div class="form-group">
                        <label for="email">Sticker:</label>
                        <input type="text" class="form-control" id="email">
                    </div>
                    <div class="form-inline">
                        <div class="form-group">
                            <label for="email">Optica:</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Sucursal:</label>
                            <input type="password" class="form-control" id="pwd">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Fecha y Hora recibida por mensajero:</label>
                        <input type="hidden" class="form-control" id="email">
                    </div>
                    <div class="form-inline">
                        <div class="form-group">
                            <label for="email">FECHA:</label>
                            <input type="date" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Hora:</label>
                            <input type="time" class="form-control" id="pwd">
                        </div>
                    </div>
                 </form>

              <!-- fin Tabla de Sucursales -->
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
            <span>Copyright &copy; Sistema de Mensajeria LESA</span>
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
  <!-- Modal agregar Sucursales -->
<?php include_once '../views/Sucursales/saveSucursales.php'?>

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
  <!-- Modal modificar Sucursales -->

  <!-- Modal eliminar Sucursales -->


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
          var id_cliente = $(this).attr("id_cliente");  
           if(id_cliente != '')  
           {  
                $.ajax({  
                     url:"../views/Sucursales/updateSucursales.php",  
                     method:"POST",  
                     data:{id_cliente:id_cliente},  
                     success:function(data){  
                          $('#employee_forms3').html(data);  
                          $('#dataModal3').modal('show');  
                     }  
                });  
           }   
      }); 
      //------------------------------------------------------------//
      $(document).on('click', '.delete_data', function(){  
          var id_cliente = $(this).attr("id_cliente");  
           if(id_cliente != '')  
           {  
                $.ajax({  
                     url:"../views/Sucursales/deleteSucursales.php",  
                     method:"POST",  
                     data:{id_cliente:id_cliente},  
                     success:function(data){  
                          $('#employee_forms3').html(data);  
                          $('#dataModal3').modal('show');  
                     }  
                });  
           }   
      });  
      //------------------------------------------------------//
    });
</script>
</body>

</html>
