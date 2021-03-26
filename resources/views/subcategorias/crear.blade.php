@extends('layouts.app')

@section('title')
    Crear Subcategoria
@endsection

@section('bodySection')
    <div class="container">
        <h2 class="text-center">Nueva Subcategoria - Información</h2>
        <div class="card">
            <div class="card-body">
                <form method="POST" action="/subcategorias">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label" >Nombre</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" required name="nombre">
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label" > Descripcion </label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" required name="descripcion">
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label" > Objetivo </label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" required name="objetivo">
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label" > Link Video </label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" required name="link_video">
                      </div>
                     

                      <button type="submit" class="btn btn-primary">Crear</button>
                </form>
            </div>
        </div>
    </div>
@endsection