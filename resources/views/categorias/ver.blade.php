@extends('layouts.app')

@section('title')
    Ver Categoria
@endsection

@section('bodySection')

<div class="container">

    <h2 class="text-center">Informacion de Categoria</h2>

    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"> <h4>{{$categoria->nombre}}</h4></h5>
                    <h6 class="card-subtitle mb-2 text-muted"> </h6>
                    <p class="card-text">{{$categoria->link_logo}}</p>
                    <p class="card-text">Descripcion: {{$categoria->descripcion}} Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae, repudiandae? Nisi inventore beatae quam. Labore quos provident, ab at ducimus voluptate officia itaque ratione odit dolorem enim consequatur animi quaerat?</p>
                    <a href="/categorias/{{$categoria->id}}/edit" class="btn btn-primary ">Editar</a>
        
                    <form method="POST" action="/categorias/{{$categoria->id}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                  
                </div>
            </div> 

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title "> <h4 class="text-center">Agregar una subcategoria</h4></h5>
                    
                        
                    <h6 class="card-subtitle mb-2 text-muted"> </h6>
                    <p class="card-text"> </p>

                    <form method="POST" action="/agregarSubcategoria/{{$categoria->id}}">
                        @csrf
                        <select class="form-select" aria-label="Default select example" name="subcategoria_id">
                            <option selected>Seleccione Subcategoria</option>
                            @foreach ($subCatDisp as $subCatD)
                            <option value="{{$subCatD->id}}">{{$subCatD->nombre}}</option>
                            @endforeach

                        </select>
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </form>
               
                </div>
              </div> 

        </div> 
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title "> <h4 class="text-center">Subcategorias</h4></h5>
                    <div style="display: flex; flex-flow: row wrap">
                        @isset($subcategorias) {{--Si subcategorias esta efinida --}}
                        @foreach ($subcategorias as $subcategoria)
                        <div class="card" style="width: 50%">
                            <div class="card-body">
                                <h5 class="card-title"> <h4>{{$subcategoria->nombre}}</h4></h5>
                                <h6 class="card-subtitle mb-2 text-muted"> Cursos: {{$subcategoria->num_cursos}} </h6>
                                
                                <p class="card-text"><a href="/subcategorias/{{$subcategoria->id}}">Ver detalles</a></p>
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