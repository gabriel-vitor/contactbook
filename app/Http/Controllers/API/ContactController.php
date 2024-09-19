<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return response()->json(Contact::all());
    }

    public function store(Request $request)
    {
        $contact = Contact::create($request->all());
        return response()->json($contact, 201);
    }

    public function show($id)
    {
        $contact = Contact::find($id);
        if ($contact) {
            return response()->json($contact);
        } else {
            return response()->json(['message' => 'Contact not found'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $contact = Contact::find($id);
        if ($contact) {
            $contact->update($request->all());
            return response()->json($contact);
        } else {
            return response()->json(['message' => 'Contact not found'], 404);
        }
    }

    public function destroy($id)
    {
        $contact = Contact::find($id);
        if ($contact) {
            $contact->delete();
            return response()->json(['message' => 'Contact deleted']);
        } else {
            return response()->json(['message' => 'Contact not found'], 404);
        }
    }
}
