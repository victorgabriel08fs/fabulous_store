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
                                                @if ($order->status == 0)
                                                    <p>Recebido</p>
                                                @elseif($order->status == 1)
                                                    <p>Pagamento confirmado</p>
                                                @else
                                                    <p>Cancelado</p>
                                                @endif
                                            </td>
                                            <td>{{ isset($order->user->name) ? $order->user->name : '' }}</td>
                                            <td>
                                                <form action="{{ route('order.update', ['order' => $order->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('patch')
                                                    <input type="hidden" name="status" value="1">
                                                    <button class="btn btn-primary" type="submit">Pagar</button>
                                                </form>
                                                <form action="{{ route('order.update', ['order' => $order->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('patch')
                                                    <input type="hidden" name="status" value="2">
                                                    <button class="btn btn-primary" type="submit">Cancelar</button>
                                                </form>
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
