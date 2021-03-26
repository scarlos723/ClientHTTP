@extends('layouts.app')

@section('title')
    Editar Instructor
@endsection

@section('bodySection')
    <div class="container ">
        <h2 class="text-center">Editar Instructor</h2>
        <div class="card">
            <div class="card-body">
                <form method="POST" action="/instructors/{{$instructor->id}}">
                    @csrf
                    @method('PUT') {{-- usar metodo put --}}
                    
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="{{$instructor->nombre}}" name="nombre">
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label"> Descripcion </label>
                        <input type="text" class="form-control" id="exampleFormControlTextarea1" value="{{$instructor->descripcion}}" name="descripcion">
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label"> Link Logo </label>
                        <input type="text" class="form-control" id="exampleFormControlTextarea1" value="{{$instructor->link_foto}}" name="link_foto">
                      </div>
                      <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
                </form>
            </div>
        </div>
    </div>
@endsection