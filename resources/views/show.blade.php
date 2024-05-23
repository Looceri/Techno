@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes da Tecnologia</h1>
    <div>
        <strong>ID:</strong> {{ $tecnologia->id }}
    </div>
    <div>
        <strong>Nome:</strong> {{ $tecnologia->name }}
    </div>
    <div>
        <strong>Marca:</strong> {{ $tecnologia->brand }}
    </div>
    <div>
        <strong>Modelo:</strong> {{ $tecnologia->model }}
    </div>
    <div>
        <strong>Categoria:</strong> {{ $tecnologia->categoria->name }}
    </div>
    <div>
        <strong>Preço:</strong> {{ $tecnologia->price }}
    </div>
    <div>
        <strong>Descrição:</strong> {{ $tecnologia->description }}
    </div>
    <div>
        <strong>Estoque:</strong> {{ $tecnologia->stock }}
    </div>
    <div>
        <strong>Nota:</strong> {{ $tecnologia->rating }}
    </div>
    <a href="{{ route('tecnologias.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection
