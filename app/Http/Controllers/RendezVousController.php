<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facture;


class RendezVousController extends Controller
{
    public function index(Request $request)
    {
        // Récupère l'ID de la laverie connectée ou ciblée
        $laverieId = auth()->user()->laverie_id; // Ou $request->laverie_id si tu le passes en paramètre

        $facturesQuery = Facture::with('client')
            ->whereHas('client', function ($query) use ($laverieId) {
                $query->where('laverie_id', $laverieId);
            });

        if ($request->filled('date_retrait')) {
            $facturesQuery->whereDate('date_retrait', $request->date_retrait);
        } else {
            $facturesQuery->whereNotNull('date_retrait');
        }

        $factures = $facturesQuery->orderBy('date_retrait', 'asc')->get();

        return view('admin.rendezvous.index', compact('factures'));
    }

}
