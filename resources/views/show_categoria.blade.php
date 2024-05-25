@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes da Tecnologia</h1>
    <div>
        <strong>ID:</strong> {{ $categoria->id }}
    </div>
    <div>
        <strong>Nome:</strong> {{ $categoria->nome }}
    </div>
    <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection
