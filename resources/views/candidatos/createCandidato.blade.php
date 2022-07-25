@extends('layouts.app')

@section('content')
    <form action="{{ route('candidato.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="CAN_NOME" placeholder="Nome do lider">
        <input type="text" name="CAN_VICE" placeholder="Nome do vice">
        <input type="file" name="CAN_IMAGEM">
        <button type="submite">enviar</button>
    </form>
@endsection