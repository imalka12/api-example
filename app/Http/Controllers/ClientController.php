<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function createClient(CreateClientRequest $request)
    {
        $data = $request->validated();
        $client = Client::create($data);

        return response()->json(['data' => $client]);
    }

    public function getClientById(Client $client)
    {
        $client = Client::whereId($client->id)->first();

        return response()->json(['data' => $client]);
    }

    public function deleteClient(Client $client)
    {
        $client->delete();
    }

    public function updateClient(CreateClientRequest $request, Client $client)
    {
        $client = Client::whereId($client->id)->first();

        $client->update([
            'name' => $request->get('name'),
            'company' => $request->get('company'),
            'address' => $request->get('address'),
            'telephone' => $request->get('telephone'),
            'email' => $request->get('email'),
            'contact_person' => $request->get('contact_person'),
            'contact_person_telephone' => $request->get('contact_person_telephone'),
            'contact_person_email' => $request->get('contact_person_email'),
        ]);
    }
}
