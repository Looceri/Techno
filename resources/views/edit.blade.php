@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Tecnologia</h1>
    <form action="{{ route('tecnologias.update', $tecnologia->id) }}" method="POST" enctype = "multipart/form-data">
        @csrf
        @method('PUT')
        @include('partials.form')
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
@endsection
