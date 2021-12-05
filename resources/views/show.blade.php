@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Fazer Pedido</div>

                <div class="card-body">
                    @if (Auth::check())
                        <form action="{{ route('order.store') }}" method="post">@csrf
                            <div class="form-group ">
                                <p>Nome:{{ auth()->user()->name }}</p>
                                <p>E-mail:{{ auth()->user()->email }}</p>
                                <p>Telefone: <input type="number" class="form-control" name="phone" required></p>
                                <p>Pequena: <input type="number" class="form-control" name="small_pizza"
                                        value="0"></p>
                                <p>Média: <input type="number" class="form-control" name="medium_pizza"
                                        value="0"></p>
                                <p>Grande pizza order: <input type="number" class="form-control" name="large_pizza"
                                        value="0"></p>
                                <p><input type="hidden" name="pizza_id" value="{{ $pizza->id }}"></p>
                                <p>Data:<input type="date" name="date" class="form-control" required></p>
                                <p>Hora:<input type="time" name="time" class="form-control" required></p>
                                <p>Menssagem:<textarea class="form-control" name="body" required></textarea></p>

                                <p class="text-center">

                                    <button class="btn btn-danger" type="submit">Pedir Pizza</button>
                                </p>
                                @if (session('message'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('message') }}
                                    </div>
                                @endif
                                @if (session('errmessage'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('errmessage') }}
                                </div>
                            @endif

                            </div>
                        </form>
                    @else
                        <p><a href="{{url('/login')}}">Efetue o LOGIN para fazer o pedido!</a></p>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pizza</div>

                <div class="card-body">
                    <img src="{{url('/')}}/{{ Storage::url($pizza->image) }}" class="img-thumbnail" style="width: 100%;">
                    <p>
                    <h3>{{ $pizza->name }}</h3>
                    </p>
                    <p>
                    <h3>{{ $pizza->description }} </h3>
                    </p>
                    <p class="badge badge-success">{{$pizza->category}}</p>
                    <p class="lead">Pequena:R${{ $pizza->small_pizza_price }}</p>
                    <p class="lead">Médi:R${{ $pizza->medium_pizza_price }}</p>
                    <p class="lead">Grande:R${{ $pizza->large_pizza_price }}</p>
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
