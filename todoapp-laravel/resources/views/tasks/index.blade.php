@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Mis Tareas</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Nueva Tarea</a>

    @if($tasks->isEmpty())
        <p>No tenés tareas aún.</p>
    @else
        <ul class="list-group">
            @foreach($tasks as $task)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong>{{ $task->title }}</strong><br>
                        <small>{{ $task->description }}</small>
                    </div>
                    <div>
                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-secondary">Editar</a>
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar tarea?')">Eliminar</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
