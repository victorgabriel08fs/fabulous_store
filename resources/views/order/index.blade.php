@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                Pedidos
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Registro</th>
                                        <th scope="col">Produto</th>
                                        <th>Subtotal</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Usuário</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->reg }}</td>
                                            <td>{{ $order->product->name }}</td>
                                            <td>{{ $order->subtotal }}</td>
                                            <td>{{ $order->total }}</td>
                                            <td>
                                                @switch($order->status)
                                                    @case(0)
                                                        <p>Recebido</p>
                                                    @break

                                                    @case(1)
                                                        <p>Pagamento confirmado</p>
                                                    @break

                                                    @case(2)
                                                        <p>Cancelado</p>
                                                    @break

                                                    @case(3)
                                                        <p>Finalizado</p>
                                                    @break

                                                    @default
                                                @endswitch
                                            </td>
                                            <td>{{ isset($order->user->name) ? $order->user->name : '' }}</td>
                                            <td class="row">
                                                @if ($order->status == 0)
                                                    <div class="col">
                                                        <form
                                                            action="{{ route('order.update', ['order' => $order->id]) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('patch')
                                                            <input type="hidden" name="status" value="1">
                                                            <button class="btn btn-primary" type="submit">Pagar</button>
                                                        </form>
                                                    </div>
                                                @endif
                                                @if ($order->status == 0 || ($order->status != 2 && (isset($order->ticket) && $order->ticket->activated != 1)))
                                                    <div class="col">
                                                        <form
                                                            action="{{ route('order.update', ['order' => $order->id]) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('patch')
                                                            <input type="hidden" name="status" value="2">
                                                            <button class="btn btn-primary" type="submit">Cancelar</button>
                                                        </form>
                                                    </div>
                                                @endif
                                            </td>
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
                                    <a class="page-link" href="{{ $orders->previousPageUrl() }}"
                                        aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                @for ($i = 1; $i <= $orders->lastPage(); $i++)
                                    <li class="page-item {{ $orders->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $orders->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                <li class="page-item">
                                    <a class="page-link" href="{{ $orders->nextPageUrl() }}" aria-label="Next">
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
