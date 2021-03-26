@extends('layouts.app')

@section('title')
    Lista Instructores
@endsection

@section('bodySection')
<div class="container">
   
    <div class="card w-50">
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item active text-center" aria-current="true">Instructores</li>
                @foreach ($instructores as $instructor)
                    <li class="list-group-item"> <a href="/instructors/{{$instructor->id}}">{{$instructor->nombre}}</a> </li>
                @endforeach               
            </ul>
            <a href="/instructors/create" class="btn btn-primary mt-3">Crear Nuevo Instructor</a>
        </div>
    </div>
   
   
</div>
    
@endsection