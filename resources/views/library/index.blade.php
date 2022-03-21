@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                Biblioteca de Produtos
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Tipo</th>
                                        <th>Descrição</th>
                                        <th>Desde de</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($library as $library_product)
                                        <tr>
                                            <td>{{ $library_product->product->name }}</td>
                                            <td>{{ $library_product->product->type }}</td>
                                            <td>{{ $library_product->product->describe }}</td>
                                            <td>{{ $library_product->created_at }}</td>
                                            <td><a href="">Baixar</a></td>
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
                                    <a class="page-link" href="{{ $library->previousPageUrl() }}"
                                        aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                @for ($i = 1; $i <= $library->lastPage(); $i++)
                                    <li class="page-item {{ $library->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $library->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                <li class="page-item">
                                    <a class="page-link" href="{{ $library->nextPageUrl() }}" aria-label="Next">
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
