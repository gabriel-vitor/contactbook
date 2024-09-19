@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2>Editar Contato</h2>
        <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" name="name" class="form-control" value="{{ $contact->name }}" required>
            </div>
            <div class="form-group">
                <label for="phone">Telefone</label>
                <input type="text" name="phone" class="form-control" value="{{ $contact->phone }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
@endsection
