@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        Vendas
                    </li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header">{{ __('Vendas') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                              <th>ID</th>
                            <th scope="col">Usuário</th>
                            <th scope="col">Telefone/Email</th>
                            <th scope="col">Data/hora</th>
                            <th scope="col">Pizza</th>
                            <th scope="col">Pequena</th>
                            <th scope="col">Média</th>
                            <th scope="col">Grande</th>
                            <th scope="col">Total(R$)</th>
                            <th scope="col">Mensagem</th>
                            <th scope="col">Status</th>
                            <th scope="col">Ações</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <th scope="row">{{$order->id}}</th>
                                    <td>{{$order->user->name}}</td>
                                    <td>{{$order->user->email}}<br>{{$order->phone}}</td>
                                    <td>{{$order->date}}/{{$order->time}}</td>
                                    <td>{{$order->pizza->name}}</td>
                                    <td>{{$order->small_pizza}}</td>
                                    <td>{{$order->medium_pizza}}</td>
                                    <td>{{$order->large_pizza}}</td>
                                    <td> 
                                        R$ {{
                                            ($order->pizza->small_pizza_price * $order->small_pizza) + 
                                            ($order->pizza->medium_pizza_price * $order->medium_pizza) +
                                            ($order->pizza->large_pizza_price * $order->large_pizza)   
                                         }}
                                    </td>
                                    <td>{{$order->body}}</td>
                                    <td>{{$order->status}}</td>
                                    <form action="{{ route('order.status', $order->id) }}" method="post">
                                        @csrf
                                        <td>
                                            <button name="status" value="ACEITO" type="submit" class="btn btn-primary btn-sm">Aceitar</button>
                                            <button name="status" value="CANCELADO"  type="submit" class="btn btn-danger btn-sm">Cancelar</button>
                                            <button name="status" value="COMPLETADO" type="submit" class="btn btn-success btn-sm">Completar</button>
                                        </td>
                                    </form>
                                    
                                </tr>
                         @endforeach
                        </tbody>
                      </table>

                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
