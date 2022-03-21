@extends('layouts.app')

@section('content')
    @component('admin.product._components.modals.product_create')
    @endcomponent
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                Produtos
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary mb-3" data-toggle="modal"
                            data-target="#modalProductCreate">
                            Novo Produto
                        </button>

                        <div class="table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Tipo</th>
                                        <th>Descrição</th>
                                        <th>Preço</th>
                                        <th>Imagem</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->describe }}</td>
                                            <td>R$ {{ number_format($product->price, 2) }}</td>
                                            <td><img src="{{ asset($product->image) }}" alt="{{ $product->name }}"></td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <a href="{{ url()->previous() }}" class="btn btn-primary float-right">Voltar</a>
                        <br>
                        <br>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="{{ $products->previousPageUrl() }}"
                                        aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                @for ($i = 1; $i <= $products->lastPage(); $i++)
                                    <li class="page-item {{ $products->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                <li class="page-item">
                                    <a class="page-link" href="{{ $products->nextPageUrl() }}" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
