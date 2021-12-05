@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Menu') }}</div>

                <div class="card-body">      
                        <form action="{{ route('frontpage') }}" method="get">
                            <a href="{{ url('/') }}" class="list-group-item list-group-item-action">>Todas</a>
                            <input type="submit" value="Vegetariana" name="category" class="list-group-item list-group-item-action">
                            <input type="submit" value="Não Vegetariana" name="category" class="list-group-item list-group-item-action">
                            <input type="submit" value="Tradicional" name="category" class="list-group-item list-group-item-action">
                            <input type="submit" value="Frango com Catupiry" name="category" class="list-group-item list-group-item-action">
                            <input type="submit" value="Camarão Alho/Óleo" name="category" class="list-group-item list-group-item-action">
                            <input type="submit" value="Frango & Camembert" name="category" class="list-group-item list-group-item-action">
                            <input type="submit" value="Calabresa" name="category" class="list-group-item list-group-item-action">
                            <input type="submit" value="Spicy peppy paneer" name="category" class="list-group-item list-group-item-action">
                            <input type="submit" value="Spicy pepperoni" name="category" class="list-group-item list-group-item-action">
                            <input type="submit" value="Vegi pepperoni" name="category" class="list-group-item list-group-item-action">
                        </form>
                        
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-header">{{ count($pizzas) }} Pizzas</div>

                <div class="card-body">
                    <div class="row">
                        
                        @forelse ($pizzas as $pizza)
                            <div class="col-md-4 mt-2 text-center" style="border: 1px solid #ccc">
                                <img src="{{url('/')}}{{Storage::url($pizza->image)}}" class="img-thumbnail" width="100" alt="">
                                <p>{{$pizza->name}}</p>
                                <p>{{$pizza->description}}</p>
                                
                                <a href="{{route('pizza.show',$pizza->id)}}">
                                    <button type="submit" class="btn btn-primary" style="margin-bottom: 10px">Fazer Pedido</button>
                                </a>
                                
                            </div>
                        @empty
                            <p>Não existe pizzas cadastradas!</p>
                        @endforelse
                        
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
