<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facture;
use App\Models\Details_factures;
use App\Models\Clients;
use App\Models\Categorie;
use App\Models\types_vetements;

class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($slug)
    {
        $client = Clients::where('slug_client',$slug)->firstOrFail();

         // Récupérer toutes les catégories et types de vêtements
         $categories = Categorie::all();
         $types = types_vetements::all();

        return view('admin.Factures.create', compact('client', 'categories', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation si nécessaire
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'date_facture' => 'required|date',
            'date_retrait' => 'required|date',
            'total' => 'required|numeric',
            'categorie_id' => 'required|array',
            'type_vetement_id' => 'required|array',
            'quantite' => 'required|array',
            'prix_unitaire' => 'required|array',
        ]);

        // Création de la facture
        $facture = new Facture();
        $facture->client_id = $request->client_id;
        $facture->date_facture = $request->date_facture;
        $facture->date_retrait = $request->date_retrait;
        $facture->total = $request->total; // Ne pas oublier ce champ
        $facture->save();

        // Détails
        foreach ($request->categorie_id as $index => $cat_id) {
            $detail = new Details_factures();
            $detail->facture_id = $facture->id;
            $detail->categorie_id = $cat_id;
            $detail->types_vetements_id = $request->type_vetement_id[$index];
            $detail->quantite = $request->quantite[$index];
            $detail->prix_unitaire = $request->prix_unitaire[$index];
            $detail->save();
        }

        return redirect()->route('Clients.show', $facture->client->slug_client)
        ->with('success', 'Facture créée avec succès.');
    }




    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $facture = Facture::with(['client', 'details.types_vetements', 'details.categorie'])->findOrFail($id);
        $client = $facture->client;

        return view('admin.Factures.show', compact('facture','client'));
    }


    public function imprimer($id)
    {
        $facture = Facture::with(['client', 'details.types_vetements', 'details.categorie'])->findOrFail($id);

        return view('admin.Factures.impression', compact('facture'));
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
