<div class="modal fade" id="modalProductCreate" tabindex="-1" role="dialog" aria-labelledby="modalProductCreate"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="formProduct" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="titleModalProductCreate">Novo Produto</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label class="form-label" for="name">Nome</label>
                        <input class="form-control" type="text" name="name" id="nameId"><br>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="describe">Descrição</label>
                        <input class="form-control" type="text" name="describe" id="describeId"><br>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="price">Preço</label>
                        <input class="form-control" type="number" step=".01" name="price" id="priceId"><br>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="image">Imagem</label>
                        <input class="form-control" type="file" name="image" id="imageId"><br>
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
