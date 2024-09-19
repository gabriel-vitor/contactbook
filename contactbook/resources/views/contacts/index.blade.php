@extends('layout')  

@section('content')
<h1>Agenda de Contatos</h1>

<!-- Div para montar o Vue.js -->
<div id="app">
    <contact-list></contact-list>
</div>

<form method="POST" action="/contacts">
    @csrf <!-- Gera o token CSRF para proteger o formulário -->
    <div>
        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" required>
    </div>
    <div>
        <label for="phone">Telefone:</label>
        <input type="text" name="phone" id="phone" required>
    </div>
    <button type="submit">Salvar</button>
</form>
@endsection
