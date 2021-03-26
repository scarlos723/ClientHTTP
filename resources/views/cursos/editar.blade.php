@extends('layouts.app')

@section('title')
    Editar Curso
@endsection

@section('bodySection')
    <div class="container ">
        <h2 class="text-center">Editar Curso</h2>
        <div class="card">
            <div class="card-body">
                <form method="POST" action="/cursos/{{$curso->id}}">
                    @csrf
                    @method('PUT') {{-- usar metodo put --}}
                    
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label" >Nombre</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" required name="nombre" value="{{$curso->nombre}}">
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label" > Descripcion </label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" required name="descripcion" value="{{$curso->descripcion}}">
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label" > Link Logo </label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" required name="link_logo" value="{{$curso->link_logo}}">
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label" > Conceptos Importantes </label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" required name="conceptos_importantes" value="{{$curso->conceptos_importantes}}">
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label" > Tiempo del Curso</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" required name="tiempo_curso" value="{{$curso->tiempo_curso}}">
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label" > Numero de Videos</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" required name="num_videos" value="{{$curso->num_videos}}">
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label" > Numero de Lecturas</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" required name="num_lecturas" value="{{$curso->num_lecturas}}">
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label" > Link Video</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" required name="link_video" value="{{$curso->link_video}}">
                      </div>
                      <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
                </form>
            </div>
        </div>
    </div>
@endsection