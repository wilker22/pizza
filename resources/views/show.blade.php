@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Menu') }}</div>

                <div class="card-body">
                  @if(Auth::check())
                    <form action="{{ route('order.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="pizza_id" value="{{$pizza->id}}">
                        <div class="form-group">
                            <p>Nome: {{ auth()->user()->name }}</p>
                            <p>E-mail: {{ auth()->user()->email }}</p>
                            <p>Telefone: <input type="number" class="form-control" name="phone"></p>
                            <p>Pizza Pequena: <input type="number" class="form-control" name="small_pizza" value="0"></p>
                            <p>Pizza Média: <input type="number" class="form-control" name="medium_pizza" value="0"></p>
                            <p>Pizza Grande: <input type="number" class="form-control" name="large_pizza" value="0"></p>
                            <p><input type="date" name="date" class="form-control" required></p>
                            <p><input type="time" name="time" class="form-control" required></p>
                            <p><textarea name="body" id=""  class="form-control" required></textarea></p>
                            <p>
                                <button type="submit" class="btn btn-primary">Comprar</button>
                            </p>
                            @if(session('message'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('message')}}
                                </div>
                            @endif

                            @if(session('errormessage'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('errormessage')}}
                                </div>
                            @endif

                        </div>
                    </form>
                  @else
                    <p><a href="{{url('/login')}}">Faça login para efetuar a compra!</a></p>
                  @endif
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body text-center">    
                            <img src="{{url('/')}}{{Storage::url($pizza->image)}}" class="img-thumbnail" width="100" alt="">
                            <h3><p>{{$pizza->name}}</p></h3> 
                            <h3><p>{{$pizza->description}}</p></h3>
                            <p>Pizza Pequena  - R$ {{$pizza->small_pizza_price}} </p>
                            <p>Pizza Média - R$ {{$pizza->small_pizza_price}}</p>
                            <p>Pizza Grande - R$ {{$pizza->small_pizza_price}}</p>
                    </div>
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
