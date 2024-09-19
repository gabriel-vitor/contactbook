<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
    $request->validate([
        'name' => 'required|max:255',
        'phone' => 'required|max:20',
    ]);

    Contact::create($request->all());
    return redirect()->route('contacts.index')->with('success', 'Contato adicionado com sucesso!');
    }

    
    public function show($id)
    {
        $contact = Contact::find($id);
        return view('contacts.show', compact('contact'));
    }

    public function edit($id)
    {
        $contact = Contact::find($id);
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $contact = Contact::find($id);
        $contact->update($request->all());
        return redirect()->route('contacts.index');
    }

    public function destroy($id)
    {
        Contact::destroy($id);
        return redirect()->route('contacts.index');
    }
}
