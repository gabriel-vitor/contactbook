@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2>Detalhes do Contato</h2>
        <div class="card">
            <div class="card-header">
                Contato #{{ $contact->id }}
            </div>
            <div class="card-body">
                <p><strong>Nome:</strong> {{ $contact->name }}</p>
                <p><strong>Telefone:</strong> {{ $contact->phone }}</p>
            </div>
        </div>
        <a href="{{ route('contacts.index') }}" class="btn btn-primary mt-3">Voltar para a lista</a>
    </div>
@endsection
