@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Tecnologia</h1>
    <form action="{{ route('categorias.update', $categoria->id) }}" method="POST" >
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ old('nome', $categoria->nome ?? '') }}" required>
        </div>
        <button type="submit" class="btn btn-primary" required>Atualizar</button>
    </form>
</div>
@endsection
