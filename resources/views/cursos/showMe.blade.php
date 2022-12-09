@extends('layouts.app')

@section('title', 'Curso')

@section('content')
    @foreach($meuscursos as $meucurso)
    <h1> Informações do curso {{$meucurso->name}}</h1>

            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="p-6">
                        <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-description">Descrição: {{$meucurso->description}}</p>
                                <p class="card-description">Professor: prof_responsavel</p>
                                <p>Status: {{$meucurso->status}}

                                <form action="/cursos/leave/{{ $meucurso->id }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-outline-info">Desmatricular-se</button>
                        </form>
                                </p>
                        </div>
                        </div>
    @endforeach
@endsection