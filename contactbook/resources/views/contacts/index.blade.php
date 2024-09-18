@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2>Lista de Contatos</h2>
        <a href="{{ route('contacts.create') }}" class="btn btn-success">Adicionar Contato</a>
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>
                            <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
