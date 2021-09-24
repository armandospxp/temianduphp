<!-- Modal -->
<div class="modal fade" id="msgConfirmacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content bd-0">

            <form class="form-horizontal">

                <div class="modal-header pd-y-20 pd-x-25">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Información</h6>
                    <button type="button" class="close" data-dismiss="modal" onclick="recargarPagina()" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body pd-25">
                    <div class="alert alert-success" role="alert">
                        <p class="mg-b-5">Planilla de responsabilidad ha sido guardada exitosamente!</p>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="form-layout-footer mg-t-30">
                        <button type="button" style="cursor:pointer;" class="btn btn-success mg-r-5" onclick="imprimirMovimiento()">Imprimir</button>
                        <button type="reset" style="cursor:pointer;" class="btn btn-secondary" data-dismiss="modal" onclick="recargarPagina()">Aceptar</button>
                    </div><!-- form-layout-footer -->
                </div>
            </form>


        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->