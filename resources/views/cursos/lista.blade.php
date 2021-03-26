@extends('layouts.app')

@section('title')
    Lista Cursos
@endsection

@section('bodySection')
<div class="container ">
   
    <div class="card w-50">
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item active text-center" aria-current="true">Cursos</li>
                @foreach ($cursos as $curso)
                    <li class="list-group-item"> <a href="/cursos/{{$curso->id}}">{{$curso->nombre}}</a> </li>
                @endforeach               
            </ul>
            <a href="/cursos/create" class="btn btn-primary mt-3">Crear Nuevo Curso</a>
        </div>
    </div>

    {{-- <div class="card w-50">
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item active text-center" aria-current="true">Posts</li>
                @foreach ($postslist as $post)
                    <li class="list-group-item"> <a href="/posts/">{{$post['title']}}</a> </li>
                @endforeach               
            </ul>
            
        </div>
    </div> --}}
   
   
</div>
    
@endsection