@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tecnologias</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th>ID</th>
                <th>Nome</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Categoria</th>
                <th>Preço</th>
                <th>Descrição</th>
                <th>Estoque</th>
                <th>Nota</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tecnologias as $tecnologia)
    <tr>
        <td>
            <img src="{{ asset($tecnologia->image) }}" alt="{{ $tecnologia->name }}" width="100" height="100">
        </td>
        <td>{{ $tecnologia->id }}</td>
        <td>{{ $tecnologia->name }}</td>
        <td>{{ $tecnologia->brand }}</td>
        <td>{{ $tecnologia->model }}</td>
        <td>{{ $tecnologia->categoria->nome}}</td>
        <td>{{ $tecnologia->price }}</td>
        <td>{{ $tecnologia->description }}</td>
        <td>{{ $tecnologia->stock }}</td>
        <td>
            <a href="{{ route('tecnologias.show', $tecnologia->id) }}" class="btn btn-info">Ver</a>
            <a href="{{ route('tecnologias.edit', $tecnologia->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('tecnologias.destroy', $tecnologia->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar</button>
            </form>
        </td>
    </tr>
@endforeach
        </tbody>
    </table>
</div>
@endsection
