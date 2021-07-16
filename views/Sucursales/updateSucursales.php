<!-- Modal -->
<?php
    //--------------------------------------------//
    $id_cliente = $_POST['id_cliente'];
    require_once "../../class/clienteModel.php";
    $clientes = new cliente();
    $listUsua = $clientes->selectOne($id_cliente);
    foreach ($listUsua as $value) {
?>

         <form id="updatecliente" method="post">
          <input type="hidden" name="id_cliente" id="id_cliente" value="<?php echo $id_cliente?>">
         
            <div class="form-group">
                <label for="exampleInputEmail1">Cliente</label>
                <input type="text" class="form-control" id="clienteActualizar" name="cliente" value="<?php echo $value['cliente']?>" aria-describedby="usernameHelp">
                <small id="usernameHelp" class="form-text text-muted">cliente.</small>
            </div>
                <div class="form-group">
                  <input type="button" id="actualizar" class="btn btn-primary" value="Guardar">
                
                </div>
        </form>
 <?php
    }
?>

<script>
document.getElementById('actualizar').addEventListener('click', actualizarInformacion);
                      function actualizarInformacion(){
                      var cliente=document.getElementById('clienteActualizar').value;
                      var id_cliente=document.getElementById('id_cliente').value;
                      $.ajax({  
                            url:`http://${server}/Lesa_Dev/controlador/clienteController.php?accion=modificar`,  
                            method:"POST",  
                            data:{id_cliente:id_cliente,cliente:cliente},  
                            success:function(data){  
                                      var array = JSON.parse(data);
                                      if (array.type == "success") {
                                        alertaEspecial(array.tittle, "<h4>"+array.text+"</h4>", array.type, array.url);
                                      }else{
                                        alerta(array.tittle, "<h4>"+array.text+"</h4>", array.type);
                                      }
                            }  
                         });  
                      }
                       
</script> 