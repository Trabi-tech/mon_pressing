<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        return view('admin.Clients.index');
    }

    public function create()
    {
        return view('admin.Clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {
            // Récupérer l'utilisateur connecté
            $user = Auth::user();

            $request->validate([
                'nom' => 'required',
                'prenom' => 'required|unique:clients',
                'contact' => 'required',
            ]);

            $data['sulgusers'] = Clients::generateSlugusers();

            $client = new Clients();
            $client->user_id = $user->id;
            $client->nom = $request->nom;
            $client->prenom = $request->prenom;
            $client->contact = $request->contact;
            $client->slug_client = $data['sulgusers'];
            $client->save();

            return redirect()->route('Clients.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
