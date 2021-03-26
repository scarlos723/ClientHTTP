@extends('layouts.app')

@section('title')
    Ver Instructor
@endsection

@section('bodySection')

<div class="container mt-3">

    <div class="row">
        <div class="col-sm-6">
    
          <div class="card" >
            <h2 class="text-center">Informacion de Instructor</h2>
            <div class="card-body">
              <h5 class="card-title"> <h4>{{$instructor->nombre}}</h4></h5>
              <h6 class="card-subtitle mb-2 text-muted"> </h6>
              <p class="card-text">{{$instructor->descripcion}}</p>
              <p class="card-text">{{$instructor->link_foto}}</p>
              <p>
                <a href="/instructors/{{$instructor->id}}/edit" class="btn btn-primary ">Editar</a>
                <form method="POST" action="/instructors/{{$instructor->id}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger " >Eliminar</button>
                </form>
              </p>

            </div>
          </div>  

        </div>    

        <div class="col-sm-6">
          <div class="card" >
            <h2 class="text-center">Asignar un Curso</h2>
            <div class="card-body">

              <form method="POST" action="/asignarcurso/{{$instructor->id}}">
                @csrf
                <div class="input-group">
                  <select class="custom-select" id="inputGroupSelect04" name="id_curso">
                    <option selected>Choose...</option>
                    @foreach ($cursosDisp as $cursoDisp)
                    <option value="{{$cursoDisp->id}}">{{$cursoDisp->nombre}}</option>
                    @endforeach
                  </select>
                  <div class="input-group-append">
                    <button type="submit" class="btn btn-outline-secondary" type="button">Asignar</button>
                  </div>
                </div>
              </form>

            </div>
          </div>    

          <div class="card" >
            
            <div class="card-body">
              
              <ul class="list-group">
                <li class="list-group-item active text-center" aria-current="true">Cursos Asignados</li>
                @if (empty($cursosAsig))
                    <h3 class="text-center m-3"> Aún no hay cursos asignados</h3>
                @endif
                @foreach ($cursosAsig as $cursoAsig)
                    <li class="list-group-item"> <a href="#">{{$cursoAsig->nombre}}</a> </li>
                @endforeach               
            </ul>

            </div>
          </div>  

        </div>  
  
    </div>  

</div>
@endsection