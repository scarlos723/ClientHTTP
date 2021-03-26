@extends('layouts.app')

@section('title')
    Editar Subcategoria
@endsection

@section('bodySection')
    <div class="container ">
        <h2 class="text-center">Editar Subcategoria</h2>
        <div class="card">
            <div class="card-body">
                <form method="POST" action="/subcategorias/{{$subcategoria->id}}">
                    @csrf
                    @method('PUT') {{-- usar metodo put --}}
                    
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                        <input type="text" class="form-control"  value="{{$subcategoria->nombre}}" name="nombre">
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label"> Descripcion </label>
                        <input type="text" class="form-control"  value="{{$subcategoria->descripcion}}" name="descripcion">
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label"> Descripcion </label>
                        <input type="text" class="form-control"  value="{{$subcategoria->objetivo}}" name="objetivo">
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label"> Link Video </label>
                        <input type="text" class="form-control"  value="{{$subcategoria->link_video}}" name="link_video">
                      </div>
                     
                      <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
                </form>
            </div>
        </div>
    </div>
@endsection