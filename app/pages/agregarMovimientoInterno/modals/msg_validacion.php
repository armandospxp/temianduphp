<?php

?>
<!-- Modal -->
<div class="modal fade" id="msgValidacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" >
        <div class="modal-content bd-0">
            
            <form class="form-horizontal">
                
                <div class="modal-header pd-y-20 pd-x-25">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Información</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body pd-25">
                   <div class="alert alert-danger" role="alert">
                    <p id="modalMensaje" class="mg-b-5"></p>
                  </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Aceptar</button>
                </div>
            </form> 
            
  
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->