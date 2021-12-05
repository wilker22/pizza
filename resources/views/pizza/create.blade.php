@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Menu') }}</div>
                <div class="card-body">
                    <ul class="list-group">
                        <a href="{{route('pizza.index')}}" class="list-group-item list-group-action">Listar Pizzas</a>
                        <a href="{{route('pizza.create')}}" class="list-group-item list-group-action">Cadastrar Pizza</a>        
                    </ul>                     
                </div>
            </div>
            <div class="card mt-5">
                <div class="card-body">
                    @if (count($errors) > 0)
                        @foreach( $errors->all() as $error )
                            <div class="alert-danger">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Pizza') }}</div>

                <div class="card-body">
                   
                   <form action="{{ route('pizza.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                       <div class="form-group">
                           <label for="name">Nome da Pizza</label>
                           <input type="text" name="name" class="form-control" placeholder="Nome da pizza">
                       </div>
                       <div class="form-group">
                            <label for="description">Descrição da Pizza</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control" placeholder="Descrição dos ingredientes"></textarea>
                        </div>
                        <div class="form-inline">
                            <label>Preço(R$)</label>
                            <input type="number" name="small_pizza_price" class="form-control" placeholder="Preço da pizza pequena">
                            <input type="number" name="medium_pizza_price" class="form-control" placeholder="Preço da pizza média">
                            <input type="number" name="large_pizza_price" class="form-control" placeholder="Preço da pizza grande">
                        </div>
                        <div class="form-group">
                            <label for="category">Categorias</label>
                            <select name="category" id="" class="form-control">
                                <option value="vegetariana">Vegetariana</option>
                                <option value="tradicional">Tradicional</option>
                                <option value="nonvegetarian">Não Vegetariana</option>
                            </select>

                            <div class="form-group">
                                <label for="image">Imagem</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-lg btn-primary">Cadastrar Pizza</button>
                            </div>
                   </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
