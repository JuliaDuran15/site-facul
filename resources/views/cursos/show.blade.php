@extends('layouts.app')

@section('title', 'Curso')

@section('content')
    <h1> Informações do curso {{$curso->name}}</h1>

            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="p-6">
                        <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-description">Descrição: {{$curso->description}}</p>
                                <p class="card-description">Professor: {{$profCurso['name']}}</p>
                                <p>Status: {{$curso->status}}</p>
                        </div>
                        @can('is_Secretaria')
                        <form action="{{ route('cursos.destroy', $curso ->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-outline-danger">Deletar</button>
                        </div>
                        </form>
                        @endcan
                        <form action="{{ route('cursos.join', $curso ->id)}}" method="POST">
                            <button type="submit" class="btn btn-outline-info">Matricular-se</button>
                        </form>
                </div>
            </div>
@endsection