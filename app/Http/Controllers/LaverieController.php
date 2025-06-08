<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laverie;


class LaverieController extends Controller
{
    public function create()
    {
        return view('admin.laverie.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
        ]);

        $laverie = new Laverie();
        $laverie->nom = $request->nom;
        $laverie->adresse = $request->adresse;
        $laverie->telephone = $request->telephone;
        $laverie->user_id = auth()->id(); // ou auth()->user()->id;
        $laverie->save();

        return redirect()->route('dashboard')->with('success', 'Laverie enregistrée avec succès.');
    }

    public function edit()
    {
        $laverie = auth()->user()->laverie;

        if (!$laverie) {
            return redirect()->route('laverie.create')->with('error', 'Aucune laverie trouvée.');
        }

        return view('admin.laverie.edit', compact('laverie'));
    }

}
