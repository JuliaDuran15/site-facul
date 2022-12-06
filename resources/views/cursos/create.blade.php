@extends('layouts.app')

@section('title', 'Criar Curso')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

            @can('is_Secretaria')

                <div class="card-header">{{ __('Cadastro de Curso') }}</div>
                <div class="card-body">


@if ($errors->any())
    <ul class="errors">
        @foreach ($errors->all() as $error)
        <li class="error">{{$error}}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('cursos.store') }}" method="POST">
    @method('POST')
    @csrf
        
            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nome do Curso') }}</label>
                <div class="col-md-6">
                <input type="text" class="from-control" id="name" name="name" placeholder="Nome do Curso">
                </div>
            </div>

            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Professor') }}</label>
                <div class="col-md-6">
                <input type="text" class="from-control" id="professor" name="professor" placeholder="Professor">
                </div>
            </div>
    
            <div class="row mb-3">
                <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Descrição Curta') }}</label>
                <div class="col-md-6">
                <textarea name="short_despriction" id="short_despriction"  class="form-control" placeholder="Descrição Curta" ></textarea>
                </div>
            </div>
    
            <div class="row mb-3">
                <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Descrição') }}</label>
                <div class="col-md-6">
                <textarea name="description" id="description"  class="form-control" placeholder="Descricao"></textarea>
                </div>
            </div>
    
            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Status ') }}</label>
                <select name="status" id="status" class="form-control">
                    <option value="abertas-natingido">Matrículas Abertas - Mínimo de alunos não atingidos</option>
                    <option value="abertas-atingido">Matrículas Abertas - Curso acontecerá</option>
                    <option value="encerradas">Matrículas Encerradas</option>
                </select>
            </div>


            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Minimo de Alunos') }}</label>
                <div class="col-md-6">
                <input type="text" class="from-control" id="min" name="min" placeholder="Minimo de Alunos">
                </div>
            </div>

            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Maximo de Alunos') }}</label>
                <div class="col-md-6">
                <input type="text" class="from-control" id="max" name="max" placeholder="Maximo de Alunos">
                </div>
            </div>
    
    

    <input type="submit" class="btn btn-outline-primary" value="Cadastrar curso">

</form>
                </div>                
            </div>
        </div>
    </div>
</div>
@endcan

@endsection