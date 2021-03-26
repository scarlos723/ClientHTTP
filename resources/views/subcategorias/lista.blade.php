@extends('layouts.app')

@section('title')
    Lista Subcategorias
@endsection

@section('bodySection')
<div class="container">
   
    <div class="card w-50">
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item active text-center" aria-current="true">Subcategorias</li>
                @foreach ($subcategorias as $subcategoria)
                    <li class="list-group-item"> <a href="/subcategorias/{{$subcategoria->id}}">{{$subcategoria->nombre}}</a> </li>
                @endforeach               
            </ul>
            <a href="/subcategorias/create" class="btn btn-primary mt-3">Crear Nuevo Subcategoria</a>
        </div>
    </div>
   
   
</div>
    
@endsection