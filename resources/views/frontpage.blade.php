@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Menu') }}</div>

                <div class="card-body">
                    <ul class="list-group">
                        <a href="" class="list-group-item list-group-item-action">Categoria 1</a>
                        <a href="" class="list-group-item list-group-item-action">Categoria 2</a>
                        <a href="" class="list-group-item list-group-item-action">Categoria 3</a>
                        <a href="" class="list-group-item list-group-item-action">Categoria 4</a>
                        <a href="" class="list-group-item list-group-item-action">Categoria 5</a>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Pizza') }}</div>

                <div class="card-body">
                    <div class="row">
                        @forelse ($pizzas as $pizza)
                            <div class="col-md-4 mt-2 text-center" style="border: 1px solid #ccc">
                                <img src="{{url('/')}}{{Storage::url($pizza->image)}}" class="img-thumbnail" width="100" alt="">
                                <p>{{$pizza->name}}</p>
                                <p>{{$pizza->description}}</p>
                                <a href="{{ route('pizza.show', $pizza->id) }}">
                                    <button type="submit" class="btn btn-primary" style="margin-bottom: 10px">Comprar</button>
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
