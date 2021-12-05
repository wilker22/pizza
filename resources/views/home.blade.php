@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Your Order History
                       
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Usuário</th>
                                    <th scope="col">Telefone/Email</th>
                                    <th scope="col">Data/Hora</th>
                                    <th scope="col">Pizza</th>
                                    <th scope="col">Pequenha</th>
                                    <th scope="col">Média</th>
                                    <th scope="col">Grande</th>
                                    <th scope="col">Total(R$)</th>
                                    <th scope="col">Menssagem</th>
                                    <th scope="col">Status</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->user->name }}</td>
                                    <td >{{ $order->user->email }}<br>{{$order->phone}}</td>
                                        <td>{{ $order->date }}/{{ $order->time }}</td>
                                        <td>{{ $order->pizza->name }}</td>
                                        <td>{{ $order->small_pizza }}</td>
                                        <td>{{ $order->medium_pizza }}</td>
                                        <td>{{ $order->large_pizza }}</td>
                                        <td>${{ ($order->pizza->small_pizza_price * $order->small_pizza)+
                                            ($order->pizza->medium_pizza_price * $order->medium_pizza)+
                                            ($order->pizza->large_pizza_price * $order->large_pizza)
                                            }}</td>
                                        <td>{{ $order->body }}</td>
                                        <td>{{ $order->status }}</td>
                                       
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<style>
    a.list-group-item{
        font-size: 18px;
    }
    a.list-group-item:hover{
        background-color: rgb(54, 137, 170);
        color: #fff;
    }
    .card-header{
        background-color: rgb(54, 137, 170);
        color: #fff;
        font-size: 20px;
    }
</style>

@endsection
