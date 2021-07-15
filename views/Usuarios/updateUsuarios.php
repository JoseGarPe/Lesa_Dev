<!-- Modal -->
<?php
    //--------------------------------------------//
    $id_usuario = $_POST['id_usuario'];
    require_once "../../class/usuarioModel.php";
    $Usuarios = new Usuario();
    $listUsua = $Usuarios->selectOne($id_usuario);
    foreach ($listUsua as $value) {
?>

         <form id="updateUsuario" method="post">
          <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $id_usuario?>">
            <div class="form-group">
                <label for="exampleInputEmail1">Nombre</label>
                <input type="text" class="form-control" id="nombreActualizar" name="nombre" value="<?php echo $value['nombre']?>" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">Nombre completo.</small>
            </div>
            
            <div class="form-group">
                <label for="exampleInputEmail1">Usuario</label>
                <input type="text" class="form-control" id="usuarioActualizar" name="usuario" value="<?php echo $value['usuario']?>" aria-describedby="usernameHelp">
                <small id="usernameHelp" class="form-text text-muted">Usuario.</small>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Placa</label>
                <input type="text" class="form-control" id="placaActualizar" value="<?php echo $value['placa']?>" name="placaActualizar" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">example@site.com.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Telefono</label>
                <input type="text" class="form-control" id="telefonoActualizar" value="<?php echo $value['telefono']?>" name="telefonoActualizar" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">example@site.com.</small>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Tipo de usuario</label>
                <select name="id_tipo_usuarioActualizar" id="id_tipo_usuarioActualizar" class="form-control">
                  <?php 
                     require_once "../../class/usuarioModel.php";
                     $NivelA = new Usuario();
                     $ListAccesos = $NivelA->selectTipoUsuario();
                     foreach ((array)$ListAccesos as $row) {
                        if ($value['id_tipo_usuario']==$row['id_tipo_usuario']) {
                             echo '<option value="'.$row['id_tipo_usuario'].'" selected>'.$row['tipo_usuario'].'</option>';
                        }else{
                             echo '<option value="'.$row['id_tipo_usuario'].'">'.$row['tipo_usuario'].'</option>'; 
                        }
                     }
                  ?>
                </select>
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

                        var nombre=document.getElementById('nombreActualizar').value;
                        var usuario=document.getElementById('usuarioActualizar').value;
                        var telefono=document.getElementById('telefonoActualizar').value;
                        var id_usuario=document.getElementById('id_usuario').value;
                        var id_tipo_usuario=document.getElementById('id_tipo_usuarioActualizar').value;
                        var placa=document.getElementById('placaActualizar').value;
                      $.ajax({  
                            url:`http://${server}/Lesa_Dev/controlador/usuarioController.php?accion=modificar`,  
                            method:"POST",  
                            data:{id_usuario:id_usuario,nombre:nombre,usuario:usuario,id_tipo_usuario:id_tipo_usuario,telefono:telefono,placa:placa},  
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