<form role="form" method="POST">
              <div class="box-body">
<?php 
require_once "../../class/usuarioModel.php";
               $codigo=$_POST["id_usuario"];
					     $actividads = new Usuario();
                         $dato = $actividads->selectOne($codigo);
                        
                      foreach ((array)$dato as $row) {
                         		echo '

                            <label>¿Desea eliminar el usuario: <strong> '.$row['nombre'].'</strong>? Se eliminara toda la informacion ingresada de este usuario.</label><p>Puedes tambien solo desactivarlo, haciendo click en "Desactivar".</p>
                          <input type="hidden" name="id" id="id_usuarioEliminar" value="'.$row['id_usuario'].'"/>  
                          <input type="hidden" name="id" id="estadoEliminar" value="Desactivado"/>  
                             ';}
?>
      </div>
              <div class="box-footer">
                <input type="button" class="btn btn-primary" id="eliminar" name="submit" value="Confirmar" >
                <input type="button" class="btn btn-secondary" id="desactivar" name="submit" value="Desactivar" >
                <input type="button" class="btn btn-danger" onClick="location.href = '../list/Usuarios.php'" name="cancel" value="Cancelar" >
              </div>
            </form>
            <script>
document.getElementById('eliminar').addEventListener('click', eliminarInformacion);
                      function eliminarInformacion(){
                        var id_usuario=document.getElementById('id_usuarioEliminar').value;
                        console.log('Datos: ');
                       console.log('id_usuario: '+id_usuario);
                      $.ajax({  
                            url:`http://${server}/Lesa_Dev/controlado/usuarioController.php?accion=eliminar`,  
                            method:"POST",  
                            data:{id_usuario:id_usuario},  
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
document.getElementById('desactivar').addEventListener('click', desactivarInformacion);
                      function desactivarInformacion(){
                        var id_usuario=document.getElementById('id_usuarioEliminar').value;
                        var estado=document.getElementById('estadoEliminar').value;
                        console.log('Datos: ');
                       console.log('id_usuario: '+id_usuario);
                      $.ajax({  
                            url:`http://${server}/Lesa_Dev/controlador/usuarioController.php?accion=status`,  
                            method:"POST",  
                            data:{id_usuario:id_usuario,estado:estado},  
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