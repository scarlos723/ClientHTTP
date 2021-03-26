@extends('layouts.app')

@section('title')
    Ver Subcategoria
@endsection

@section('bodySection')

<div class="container">

  <h2 class="text-center">Informacion de Subcategoria</h2>

  <div class="row">
      <div class="col-sm-6">
          <div class="card">
              <div class="card-body">
                  <h5 class="card-title"> <h4>{{$subcategoria->nombre}}</h4></h5>
                  <h6 class="card-subtitle mb-2 text-muted"> </h6>
                  <p class="card-text">{{$subcategoria->link_video}}</p>
                  <p class="card-text">Descripcion: {{$subcategoria->descripcion}} Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae, repudiandae? Nisi inventore beatae quam. Labore quos provident, ab at ducimus voluptate officia itaque ratione odit dolorem enim consequatur animi quaerat?</p>
                  <a href="/subcategorias/{{$subcategoria->id}}/edit" class="btn btn-primary ">Editar</a>
      
                  <form method="POST" action="/subcategorias/{{$subcategoria->id}}">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Eliminar</button>
                  </form>
                
              </div>
          </div> 

          <div class="card">
            <div class="card-body">
                <h5 class="card-title "> <h4 class="text-center">Agregar Nivel</h4></h5>
                <div style="display: flex; flex-flow: row wrap">
                  
                    <form method="POST" action="/agregarnivel/{{$subcategoria->id}}">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label"> Nombre Nivel </label>
                            <input type="text" class="form-control"  placeholder="Nivel 1" name="nombre_nivel">
                            <button type="submit" class="btn btn-primary">Agregar</button>
                        </div>
                    </form>
                    
                    
                    
                </div>
              
            </div>
          </div> 
      </div> 
      <div class="col-sm-6">
          <div class="card">
              <div class="card-body">
                  <h5 class="card-title "> <h4 class="text-center">Cursos</h4></h5>
                  <div style="display: flex; flex-flow: row wrap">
                      @isset($niveles) {{--Si subcategorias esta efinida --}}

                      
                      @foreach ($niveles as $nivel)
                     
                      <div class="card" style="width: 50%">
                          <div class="card-body">
                              <h5 class="card-title"> <h4>{{$nivel['nombre_nivel']}}</h4></h5>
                              
                              
                              <div style="display: flex; flex-flow: row wrap">
                                @foreach ($nivel['cursos'] as $curso)
                                <div class="card" style="width: 50%">
                                  <div class="card-body">
                                      <h5 class="card-title">{{$curso['nombre']}} <h4></h4></h5>
                                      <h6 class="card-subtitle mb-2 text-muted">  </h6>
                                       <p class="card-text"><a href="/cursos/{{$curso['id']}}">Ver curso</a></p>
                                  </div>

                                </div>
                                @endforeach
                                

                              </div>
                              
                          </div>
                      </div>
                      @endforeach
                      @endisset
                      
                  </div>
                
              </div>
          </div> 
      </div>        
   
  </div>    
</div>

@endsection