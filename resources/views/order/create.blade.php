@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Pedido') }}</div>

                    <div class="card-body">

                        <form action="{{ route('order.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col">
                                    <label for="">Produto: </label>
                                    <input hidden name="product_id" value="{{ $product->id }}" />{{ $product->name }}
                                </div>

                                <div class="form-group col">
                                    <label for="">Valor: </label> {{ $product->price }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="">Total: </label>
                                    <input class="form-control" readonly type="number" step="0.01" name="total"
                                        value="{{ number_format($product->price, 2) }}">
                                </div>
                                <div class="form-group col">
                                    <label for="">Subotal: </label>
                                    <input class="form-control" readonly type="number" step="0.01" name="subtotal"
                                        value="{{ number_format($product->price - $discount, 2) }}">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary" type="submit">Finalizar compra</button>
                            </div>
                        </form>
                        {{-- @if ($discount == 0)
                            <div class="row mt-3">
                                <form action="{{ route('order.coupon', ['product' => $product->id]) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <label for="">Cupom: </label>
                                    <input class="form-control col" type="text" name="coupon" id=""
                                        value="{{ old('coupon') }}">
                                    <button class="btn btn-secondary col" type="submit">Inserir cupom</button>

                                </form>
                            </div>
                        @endif --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
