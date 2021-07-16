<form role="form" method="POST">
              <div class="box-body">
<?php 
require_once "../../class/clienteModel.php";
               $codigo=$_POST["id_cliente"];
					     $actividads = new Cliente();
                         $dato = $actividads->selectOne($codigo);
                        
                      foreach ((array)$dato as $row) {
                         		echo '

                            <label>¿Desea eliminar el usuario: <strong> '.$row['cliente'].'</strong>? Se eliminara toda la informacion ingresada de este usuario.</label><p>Puedes tambien solo desactivarlo, haciendo click en "Desactivar".</p>
                          <input type="hidden" name="id" id="id_clienteEliminar" value="'.$row['id_cliente'].'"/> 
                          <input type="hidden" name="id" id="clienteEliminar" value="'.$row['cliente'].'"/>  
                             ';}
?>
      </div>
              <div class="box-footer">
                <input type="button" class="btn btn-primary" id="eliminar" name="submit" value="Confirmar" >
                <input type="button" class="btn btn-danger" onClick="location.href = '../list/Usuarios.php'" name="cancel" value="Cancelar" >
              </div>
            </form>
            <script>
document.getElementById('eliminar').addEventListener('click', eliminarInformacion);
                      function eliminarInformacion(){
                        var id_cliente=document.getElementById('id_clienteEliminar').value;
                        var cliente=document.getElementById('clienteEliminar').value;
                        console.log('Datos: ');
                      $.ajax({  
                            url:`http://${server}/Lesa_Dev/controlador/clienteController.php?accion=eliminar`,  
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