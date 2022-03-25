@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Loja') }}</div>

                    <div class="card-body">
                        @if (!$products->first())
                            <p>Por enquanto a loja está vazia...</p>
                        @else
                            <div class="gallery">
                                @foreach ($products as $product)
                                    <a class="link"
                                        href="{{ route('product.show', ['product' => $product->id]) }}">
                                        <div class="mini-card-body">
                                            <img src="{{ url(asset($product->image)) }}" alt="">
                                            <h5 class="mini-card-title">{{ $product->name }}</h5>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="card-footer">
                        <a href="{{ url()->previous() }}" class="btn btn-primary float-right">Voltar</a>
                        <br>
                        <br>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="{{ $products->previousPageUrl() }}"
                                        aria-label="Anterior">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Anterior</span>
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
                                        <span class="sr-only">Próximo</span>
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
