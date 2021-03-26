@extends('layouts.app')

@section('title')
    Ver Curso
@endsection

@section('bodySection')

    <div class="container tm-3">

      
      <div class="row">

        <div class="col-sm-6">
          <h2 class="text-center">Informacion de Curso</h2>
          <div class="card" >
            <div class="card-body">
              <h5 class="card-title"> <h4>{{$curso->nombre}}</h4></h5>
              <h6 class="card-subtitle mb-2 text-muted"> </h6>
              <p class="card-text">El id externo es: {{$curso->id_externo}}</p>
              <p class="card-text">{{$curso->descripcion}}</p>
              <p class="card-text">{{$curso->link_video}}</p>
              <p>
              <a href="/cursos/{{$curso->id}}/edit" class="btn btn-primary d-inline">Editar</a>
                <form method="POST" action="/cursos/{{$curso->id}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger d-inline" >Eliminar</button>
                </form>
              </p>
            </div>
          </div> 

          <div class="card">
            <div class="card-body">
                <h5 class="card-title "> <h4 class="text-center">Instructores</h4></h5>
                <div style="display: flex; width:100%;">
                    {{--Si nivelesAsig esta efinida --}}
                    @foreach ($curso['instructores'] as $instructor)
                    <div class="card" style="width: 100%">
                        <div class="card-body" >
                            <h5 class="card-title"> <h4>{{$instructor->nombre}}</h4></h5>
                            <h6 class="card-subtitle mb-2 text-muted">Descripcion: {{$instructor->descripcion}} </h6>
                             <p class="card-text"> </p>
                        </div>
                    </div>
                    @endforeach
                    
                    
                </div>
              
            </div>
          </div> 
          
          <div class="card">
            <div class="card-body">
                <h5 class="card-title "> <h4 class="text-center">Niveles Asignados</h4></h5>
                <div style="display: flex; flex-flow: row wrap">
                  
                    @foreach ($curso['niveles'] as $nivel)
                    <div class="card" style="width: 50%">
                        <div class="card-body">
                            <h5 class="card-title"> <h4>{{$nivel->nombre}}</h4></h5>
                            <h6 class="card-subtitle mb-2 text-muted">subcategoria: {{$nivel['subcategoria']->nombre}} </h6>
                             <p class="card-text"> </p>
                        </div>
                    </div>
                    @endforeach
                    
                    
                </div>
              
            </div>
          </div> 
          
          <div class="card">
            <div class="card-body">
                <h5 class="card-title "> <h4 class="text-center">Agregar a un Nivel de Subcategoria</h4></h5>
                <div style="display: flex; flex-flow: row wrap">
                  
                    @foreach ($formSubcats as $subCat)
                    <div class="card" style="width: 50%">
                        <div class="card-body">
                            <h5 class="card-title"> <h4>{{$subCat->nombre}}</h4></h5>
                            <form method="POST" action="/agregarnivelsubcat/{{$curso->id}}">
                              @csrf
                              <select class="form-select" aria-label="Default select example" name="nivel_id">
                                <option selected>Selecciona Nivel</option>
                                    @foreach ($subCat['niveles'] as $nivelcat)
                                    <option value="{{$nivelcat->id}}">{{$nivelcat->nombre}}</option>
                                    @endforeach
                                
                              </select>
                              <button type="submit" class="btn btn-primary">Agregar</button>
                            </form>
                            
                        </div>
                    </div>
                    @endforeach
                    
                    
                </div>
              
            </div>
          </div>  


          {{-- <div class="card">
            <div class="card-body">
                <h5 class="card-title "> <h4 class="text-center">Niveles No Asignados</h4></h5>
                <div style="display: flex; flex-flow: row wrap">
                    @isset($nivelesDisp) 
                    @foreach ($nivelesDisp as $nivelDisp)
                    <div class="card" style="width: 50%">
                        <div class="card-body">
                            <h5 class="card-title"> <h4>{{$nivelDisp->nombre}}</h4></h5>
                            <h6 class="card-subtitle mb-2 text-muted"> {{$nivelDisp->subcategoria_id}} </h6>
                             <p class="card-text"> </p>
                        </div>
                    </div>
                    @endforeach
                    @endisset
                    
                </div>
              
            </div>
          </div>  --}}
          
        </div>

        <div class="col-sm-6">
          <div class="card" >
            <div class="list-group">
              <a href="#" class="list-group-item list-group-item-action active">
                Lista con respecto al id {{$curso->id_externo}}
              </a>
              @foreach ($infoExterna as $infoEx)
                <a href="{{$infoEx['url']}}" class="list-group-item list-group-item-action">{{$infoEx['title']}}</a>
              @endforeach
              
              
            </div>
          </div>
        </div>
      </div>

      
    </div>
@endsection