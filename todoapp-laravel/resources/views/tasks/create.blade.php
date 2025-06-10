@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Crear Tarea</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ups!</strong> Hay errores en el formulario:<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
@endsection
