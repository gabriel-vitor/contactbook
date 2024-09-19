<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Listar todos os contatos
    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }

    // Exibir formulário de criação de contato
    public function create()
    {
        return view('contacts.create');
    }

    // Armazenar um novo contato
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required|max:20',
        ]);

        Contact::create($request->all());

        return redirect()->route('contacts.index')->with('success', 'Contato adicionado com sucesso!');
    }

    // Exibir um contato específico
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.show', compact('contact'));
    }

    // Exibir formulário de edição de contato
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.edit', compact('contact'));
    }

    // Atualizar um contato existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required|max:20',
        ]);

        $contact = Contact::findOrFail($id);
        $contact->update($request->all());

        return redirect()->route('contacts.index')->with('success', 'Contato atualizado com sucesso!');
    }

    // Excluir um contato
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Contato excluído com sucesso!');
    }
}
