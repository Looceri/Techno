@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cadastrar um novo produto</h1>
    <form action="{{ route('tecnologias.store') }}" method="POST">
        @csrf
        @include('tecnologias.partials.form')
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection
