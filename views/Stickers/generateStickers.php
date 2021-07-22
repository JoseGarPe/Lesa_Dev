<!-- Modal -->
<?php
    //--------------------------------------------//
    $id_stickers = $_POST['id_stickers'];
    require_once "../../class/stickersModel.php";
    $stickerss = new Stickers();
    $listUsua = $stickerss->selectOne($id_stickers);
    foreach ($listUsua as $value) {
?>

         <form id="updatestickers" method="post">
          <input type="hidden" name="id_stickers" id="id_stickers" value="<?php echo $id_stickers?>">

            <div class="form-group">
                <label for="exampleInputEmail1">Se generaran esta cantidad de stickers</label>
                <input type="cantidad" class="form-control" id="cantidadGenerar" name="stickers" value="<?php echo $value['cantidad'];?>" aria-describedby="usernameHelp">
                <input type="hidden" id="rutaGenerar" name="ruta" value="<?php echo $value['id_ruta'];?>">
                <input type="hidden" id="horarioGenerar" name="horario" value="<?php echo $value['id_horario'];?>">
            </div>
                <div class="form-group">
                  <input type="button" id="generar" class="btn btn-success" value="Generar">
                
                </div>
        </form>
 <?php
    }
?>

<script>
document.getElementById('generar').addEventListener('click', generarInformacion);
                      function generarInformacion(){
                      var cantidad=document.getElementById('cantidadGenerar').value;
                      var id_stickers=document.getElementById('id_stickers').value;
                      var id_ruta=document.getElementById('rutaGenerar').value;
                      var id_horario=document.getElementById('horarioGenerar').value;
                      $.ajax({  
                            url:`http://${server}/Lesa_Dev/controlador/stickerController.php?accion=generar`,  
                            method:"POST",  
                            data:{id_stickers:id_stickers,cantidad:cantidad,id_ruta:id_ruta,id_horario:id_horario},  
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