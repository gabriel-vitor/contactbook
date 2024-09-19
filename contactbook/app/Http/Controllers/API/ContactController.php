<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Listar todos os contatos
    public function index()
    {
        return Contact::all();
    }

    // Armazenar um novo contato
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
        ]);

        return Contact::create($request->all());
    }

    // Mostrar um contato específico (não utilizado, mas implementado para completar o resource controller)
    public function show(Contact $contact)
    {
        return $contact;
    }

    // Atualizar um contato
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
        ]);

        $contact->update($request->all());

        return $contact;
    }

    // Deletar um contato
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return response()->noContent();
    }
}
