@extends('layouts.app')

@section('title')
    Crear Curso
@endsection

@section('bodySection')
    <div class="container">
        <h2 class="text-center">Nuevo Curso - Informacion</h2>
        <div class="card">
            <div class="card-body">
                <form method="POST" action="/cursos">
                    @csrf
                    <div class="mb-3">
                      <select class="form-select" aria-label="Default select example" name="id_externo">
                        <option selected>Seleccione Id Externo</option>
                        @foreach ($albums as $album)
                        <option value="{{$album['albumId']}}">{{$album['albumId']}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label" >Nombre</label>
                      <input type="text" class="form-control" id="exampleFormControlInput1" required name="nombre">
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlTextarea1" class="form-label" > Descripcion </label>
                      <input type="text" class="form-control" id="exampleFormControlInput1" required name="descripcion">
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlTextarea1" class="form-label" > Link Logo </label>
                      <input type="text" class="form-control" id="exampleFormControlInput1" required name="link_logo">
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlTextarea1" class="form-label" > Conceptos Importantes </label>
                      <input type="text" class="form-control" id="exampleFormControlInput1" required name="conceptos_importantes">
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlTextarea1" class="form-label" > Tiempo del Curso</label>
                      <input type="text" class="form-control" id="exampleFormControlInput1" required name="tiempo_curso">
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlTextarea1" class="form-label" > Numero de Videos</label>
                      <input type="text" class="form-control" id="exampleFormControlInput1" required name="num_videos">
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlTextarea1" class="form-label" > Numero de Lecturas</label>
                      <input type="text" class="form-control" id="exampleFormControlInput1" required name="num_lecturas">
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlTextarea1" class="form-label" > Link Video</label>
                      <input type="text" class="form-control" id="exampleFormControlInput1" required name="link_video">
                    </div>
                    <button type="submit" class="btn btn-primary">Crear</button>
                </form>
            </div>
        </div>
    </div>
@endsection