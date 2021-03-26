@extends('layouts.app')

@section('title')
    Lista Categorias
@endsection

@section('bodySection')

<div class="container">
    <div class="card-group">
        @foreach ($categorias as $categoria)
        <div class="card">
            <img class="card-img-top" src="{{$categoria->link_logo}}" alt="{{$categoria->link_logo}}">
            <div class="card-body">
                <h5 class="card-title"><a href="/categorias/{{$categoria->id}}">{{$categoria->nombre}}</a></h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
            <div class="card-footer">
                <small class="text-muted">Last updated 3 mins ago</small>
            </div>
        </div>
        @endforeach
    </div>
    
    <a href="/categorias/create" class="btn btn-primary mt-3">Crear Nueva Categoria</a>
   
</div>



    
@endsection