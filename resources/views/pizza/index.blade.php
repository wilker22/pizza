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
                                                <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$pizza->id}}">Remover</button>
                                            </td>
                
                                            <!-- Modal -->
                                            
                                                <div class="modal fade" id="exampleModal{{$pizza->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <form action="{{route('pizza.destroy', $pizza->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Confirmar a Remoção</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                            Tem certeza que deseja remover o item!?
                                                            </div>
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                            <button type="submit" class="btn btn-danger">Remover</button>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            
                                            
                                   </tr>
                                @endforeach
                            @else    
                                    <p>Não existem pizzas cadastradas!</p>
                            @endif
                                
                        </tbody>
                    </table>
                    {{ $pizzas->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
