@extends('layouts.app')

@section('title')
    Editar Categoria
@endsection

@section('bodySection')
    <div class="container ">
        <h2 class="text-center">Editar Categoria</h2>
        <div class="card">
            <div class="card-body">
                <form method="POST" action="/categorias/{{$categoria->id}}">
                    @csrf
                    @method('PUT') {{-- usar metodo put --}}
                    
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="{{$categoria->nombre}}" name="nombre">
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label"> Descripcion </label>
                        <input type="text" class="form-control" id="exampleFormControlTextarea1" value="{{$categoria->descripcion}}" name="descripcion">
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label"> Link Logo </label>
                        <input type="text" class="form-control" id="exampleFormControlTextarea1" value="{{$categoria->link_logo}}" name="link_logo">
                      </div>
                      <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
                </form>
            </div>
        </div>
    </div>
@endsection