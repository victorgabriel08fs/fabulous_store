@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __($product->name) }}</div>

                    <div class="card-body">
                        @if (!$product->first())
                            <p>Por enquanto a loja está vazia...</p>
                        @else
                            <div class="wrapper">
                                {{-- <a class="link" href="{{ route('product.show', ['product' => $product->id]) }}">
                                    <div class="mini-card-body">
                                        <h5 class="mini-card-title">{{ $product->name }}</h5>
                                    </div>
                                </a> --}}
                                <div class="wrapper-item col">
                                    <img src="{{ url(asset($product->image)) }}" alt="">
                                </div>

                                <div class="wrapper-item  col">
                                    {{ $product->describe }}
                                </div>
                                <div class="wrapper-item order col">
                                    <p class="row align-items-center avaliation">
                                        Avaliação:
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $product->avaliation)
                                                <i class="fa-solid fa-star col"></i>
                                            @else
                                                <i class="fa-regular fa-star col"></i>
                                            @endif
                                        @endfor
                                    </p>
                                    <p class="row">Por: {{ $product->publisher }}</p>
                                    <p><strong class="row">Preço:
                                            {{ number_format($product->price, 2) }}</strong></p>
                                    <a href="{{ route('order.create-page', ['product' => $product->id]) }}"
                                        class="row btn btn-primary {{ $has_product ? 'disabled' : '' }}">{{ $has_product ? 'Já possui' : 'Comprar' }}</a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
