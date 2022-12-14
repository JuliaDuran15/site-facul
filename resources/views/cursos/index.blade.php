@extends('layouts.app')

@section('title','Cursos')

@section('content')
<div class="dashboard-title-container">
    <h1> Cursos disponíveis: </h1>
</div>


@auth
<div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg dashboard-container">
    <div class="grid grid-cols-1 md:grid-cols-2">
        <div class="row">
        @if(count($cursos)>0)
        
                @foreach($cursos as $curso)
                <div class="card" style="width: 25%">
                    <img src="img/curso.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$curso->name}}</h5>
                        <p class="card-text">Descrição: {{$curso->short_despriction}}</p>
                        <p class="card-text">Professor: professor responsavel</p>
                        <p class="card-text">Status: {{$curso->status}}</p>
                
                    <a href="{{route('cursos.show', $curso->id)}}" class="btn btn-outline-info">Descrição</a>
                    @if(Auth::user()->acesso  == "secretaria")
                    <a href="{{route('cursos.edit', $curso->id)}}" class="btn btn-outline-success">Editar</a>
                    @endif
                    @if(Auth::user()->acesso  == 'aluno')
                    <form action="{{ route('cursos.join', $curso->id)}}" method="POST">
                        @method('GET')
                        @csrf

                    <button type="submit" class="btn btn-outline-primary">Matricular</button>
                    </form>
                    @endif
                    </div>
                </div>
                @endforeach
        </div>
            
        @else 
        <p>Ainda não há cursos</p>
        @endif
    </div>
</div>
<div class="flex justify-center mt-4 sm:items-center sm:justify-between">
@if(Auth::user()->acesso  == "secretaria")
<a href="{{ route ('cursos.create')}} " class="btn btn-outline-dark btn-sm">Cadastrar Novo Curso</a>
@endif
</div>
@endauth
@guest
<div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg dashboard-container">
    <div class="grid grid-cols-1 md:grid-cols-2">
    <a>Você não pode acessar sem login</a>
    </div>
</div>
@endguest



@endsection    

