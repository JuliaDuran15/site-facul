@extends('layouts.app')

@section('content')
<h1> Informações a Materia {{$curso->name}}</h1>


            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="p-6">
                        <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-description">Descrição: {{$curso->description}}</p>
                                <p class="card-description">Professor: professor</p>
                                <p>Status: {{$curso->status}}</p>
                        </div>
                        <form action="{{ route('cursos.destroy', $curso ->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-outline-danger">Deletar</button>
                        </div>
                        </form>
                        <form action="{{ route('cursos.join', $curso ->id)}}" method="POST">
                            <button type="submit" class="btn btn-outline-info">Matricular-se</button>
                        </form>
                </div>
            </div>
@endsection