@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Biblioteca') }}</div>
                    <div class="card-body">
                        @if (!$library_products->first())
                            <p>Por enquanto sua biblioteca está vazia...</p>
                        @else
                            <div class="gallery">
                                @foreach ($library_products as $library)
                                    <a class="link"
                                        href="{{ route('product.show', ['product' => $library->product->id]) }}">
                                        <div class="mini-card-body">
                                            <img src="{{ url(asset($library->product->image)) }}" alt="">
                                            <h5 class="mini-card-title">{{ $library->product->name }}</h5>
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
                                    <a class="page-link" href="{{ $library_products->previousPageUrl() }}"
                                        aria-label="Anterior">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Anterior</span>
                                    </a>
                                </li>
                                @for ($i = 1; $i <= $library_products->lastPage(); $i++)
                                    <li class="page-item {{ $library_products->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link"
                                            href="{{ $library_products->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                <li class="page-item">
                                    <a class="page-link" href="{{ $library_products->nextPageUrl() }}"
                                        aria-label="Next">
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
