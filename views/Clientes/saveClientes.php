<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Agregar Clientes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Cliente</label>
                <input type="text" class="form-control" id="cliente" name="cliente" aria-describedby="usernameHelp">
                <small id="usernameHelp" class="form-text text-muted">Nombre de Cliente.</small>
            </div>
            
        </form>
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="buttom" id="guardar" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>


<script>
document.getElementById('guardar').addEventListener('click', enviarInformacion);
                      function enviarInformacion(){

                        var Cliente=document.getElementById('cliente').value;

                        var formData = new FormData();
                        formData.append('cliente', Cliente);
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
                        xhr.open("POST", `http://${server}/Lesa_Dev/controlador/clienteController.php?accion=guardar`, true);
                        xhr.send(formData);
                      }
                       
</script>