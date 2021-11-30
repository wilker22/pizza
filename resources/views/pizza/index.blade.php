@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Pizzas') }}</div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    
                    <table class="table table-striped table-hover">
                        <thead>
                            <th>#</th>
                            <th>Imagem</th>
                            <th>Nome</th>
                            <th>Categoria</th>
                            <th>Descrição</th>
                            <th>Preço da Pequena</th>
                            <th>Preço da Média</th>
                            <th>Preço da Grande</th>
                            <th>Ações</th>
                            
                        </thead>
                        <tbody>
                            @if (count($pizzas) > 0)
                                @foreach($pizzas as $pizza)
                                    <tr class="text-center">
                                            <td>{{$pizza->id}}</td>
                                            <td><img src="{{url('/')}}{{Storage::url($pizza->image)}}" width="80" alt=""></td>
                                            <td>{{$pizza->name}}</td>
                                            <td>{{$pizza->category}}</td>
                                            <td>{{$pizza->description}}</td>
                                            <td>{{$pizza->small_pizza_price}}</td>
                                            <td>{{$pizza->medium_pizza_price}}</td>
                                            <td>{{$pizza->large_pizza_price}}</td>
                                            <td>
                                                <a href="{{ route('pizza.edit', $pizza->id) }}"><button class="btn btn-primary">Editar</button></a>
                                                <a href="{{ route('pizza.destroy', $pizza->id) }}"><button class="btn btn-danger">Remover</button></a>
                                            </td>
                                     </tr>
                                @endforeach
                            @else    
                                    <p>Não existem pizzas cadastradas!</p>
                            @endif
                                
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
