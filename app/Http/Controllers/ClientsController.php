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

         // Récupérer les joueurs associés à cet utilisateur
        $clients = $user->clients;

        return view('admin.Clients.index', compact('clients'));
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
                'prenom' => 'required',
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
    public function edit($slug)
    {
        $client = Clients::where('slug_client',$slug)->firstOrFail();

        return view('admin.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $data = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'contact' => 'required',
        ]);

        $client = Clients::where('slug_client',$request->slug_client)->firstOrFail();

        $data['sulgusers'] = Clients::generateSlugusers();

        $client->nom = $request->nom;
        $client->prenom = $request->prenom;
        $client->contact = $request->contact;
        $client->slug_client = $data['sulgusers'];
        $client->save();

        return redirect()->route('Clients.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $client = Clients::where('slug_client',$slug)->firstOrFail();

        $client->delete();

        return redirect()->route('Clients.index');
    }
}
