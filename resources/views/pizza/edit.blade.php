@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-8">
                    @if (count($errors) > 0)
                        @foreach( $errors->all() as $error )
                            <div class="alert-danger">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif
            <div class="card">
                <div class="card-header">{{ __('Editar Pizza') }}</div>

                <div class="card-body">
                   
                   <form action="{{ route('pizza.update', $pizza->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                       <div class="form-group">
                           <label for="name">Nome da Pizza</label>
                           <input type="text" name="name" class="form-control" placeholder="Nome da pizza" value="{{$pizza->name}}">
                       </div>
                       <div class="form-group">
                            <label for="description">Descrição da Pizza</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control" placeholder="Descrição dos ingredientes">
                                {{$pizza->description}}
                            </textarea>
                        </div>
                        <div class="form-inline">
                            <label>Preço(R$)</label>
                            <input type="number" name="small_pizza_price" class="form-control" placeholder="Preço da pizza pequena" value="{{$pizza->small_pizza_price}}">
                            <input type="number" name="medium_pizza_price" class="form-control" placeholder="Preço da pizza média" value="{{$pizza->medium_pizza_price}}">
                            <input type="number" name="large_pizza_price" class="form-control" placeholder="Preço da pizza grande" value="{{$pizza->large_pizza_price}}">
                        </div>
                        <div class="form-group">
                            <label for="category">Categorias</label>
                            <select name="category" id="" class="form-control">
                                <option value="{{$pizza->id}}">{{$pizza->name}}</option>
                            </select>

                            <div class="form-group">
                                <label for="image">Imagem</label>
                                <input type="file" name="image" class="form-control" id="">
                                <img src="{{url('/')}}{{Storage::url($pizza->image)}}" width="80">
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-lg btn-primary">Editar Pizza</button>
                            </div>
                   </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
