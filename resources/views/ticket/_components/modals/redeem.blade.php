<div class="modal fade" id="modalRedeem" tabindex="-1" role="dialog" aria-labelledby="modalRedeem"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="formProduct" action="{{ route('ticket.redeem') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="titleModalRedeem">Resgatar Código</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label class="form-label" for="code">Código</label>
                        <input class="form-control" type="text" name="code" id="codeId"><br>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </div>
            </form>
        </div>
    </div>
</div>
