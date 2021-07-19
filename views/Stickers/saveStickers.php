<div class="modal fade" id="stickerModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Generar Sticker</h5>
        <button type="button" class="btn btn-light cls_sticker" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body">
          <form method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Ruta</label>
                    <select name="id_ruta" id="id_ruta" class="form-control">
                      <?php 
                        require_once "../class/stickersModel.php";
                        $sticker = new Stickers();
                        $ListRuta = $sticker->selectRutas();
                        foreach ((array)$ListRuta as $row) {
                          echo '<option value="'.$row['id_ruta'].'">'.$row['ruta'].'</option>';
                        }
                      ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Horario</label>
                    <select name="id_horario" id="id_horario" class="form-control">
                      <?php 
                        $LisHorario = $sticker->selectHorarios();
                        foreach ((array)$LisHorario as $value) {
                          echo '<option value="'.$value['id_horario'].'">'.$value['horario'].'</option>';
                        }
                      ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Fecha</label>
                    <input type="date" class="form-control" id="fecha" name="fecha" aria-describedby="usernameHelp">
                    <small id="usernameHelp" class="form-text text-muted">Fecha.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Cantidad</label>
                    <input type="number" min="1"  class="form-control" id="cantidad" name="cantidad" aria-describedby="usernameHelp">
                    <small id="usernameHelp" class="form-text text-muted">Cantidad a generar de stickers.</small>
                </div>
            </form>
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary cls_sticker" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" id="guardarS" class="btn btn-primary">Generar</button>
      </div>
    </div>
  </div>
</div>
<script>
$(document).on('click', '.sticker', function(){$('#stickerModal').modal('show');}); 
$(document).on('click', '.cls_sticker', function(){$('#stickerModal').modal('hide');}); 
document.getElementById('guardarS').addEventListener('click', enviarInformacionSticker);
                      function enviarInformacionSticker(){

                        var id_ruta=document.getElementById('id_ruta').value;
                        var id_horario=document.getElementById('id_horario').value;
                        var fecha=document.getElementById('fecha').value;
                        var cantidad=document.getElementById('cantidad').value;

                        var formData = new FormData();
                        formData.append('id_ruta', id_ruta);
                        formData.append('id_horario', id_horario);
                        formData.append('fecha', fecha);
                        formData.append('cantidad', cantidad);
                        var xhr = new XMLHttpRequest();
                        xhr.onreadystatechange = function(){
                          if (this.readyState == 4 && this.status == 200) {
                            /*
                              UNA VEZ VERIFICADA QUE NUESTRA PETICIÓN HAYA RESULTADO EXITOSA
                              MANDAMOS LOS DATOS AL END POINT PARA GUARDARLOS EN LA BASE DE DATOS
                            */
                              var array = JSON.parse(this.response);
                              if (array.type == "success") {
                                alertaEspecial(array.tittle, "<h4>"+array.text+"</h4>", array.type, array.url);
                              }else{
                                alerta(array.tittle, "<h4>"+array.text+"</h4>", array.type);
                              }
                          }
                        };
                        /*
                          DEFINIMOS EL TIPO DE METODO Y LA URL DEL END POINT ESPECIFICO
                          LUEGO MANDAMOS LOS HEADERS NECESARIOS PARA NUESTRA API
                          Y POR ULTIMO EN LA FUNCION SEND, MANDAMOS LOS DATOS NECESARIOS PARA QUE NOS RETORNE EL TOKE
                          EN ESTE CASO EL CLIENTE Y EL ID
                        */
                        //xhr.open("POST", "https://pruebafiado.000webhostapp.com/sitioWeb/php/controladores/variablesSesiones.php", true);
                        xhr.open("POST", `http://${server}/Lesa_Dev/controlador/stickerController.php?accion=guardar`, true);
                        xhr.send(formData);
                      }

</script>