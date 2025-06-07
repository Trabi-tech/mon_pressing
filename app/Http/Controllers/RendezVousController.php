<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facture;


class RendezVousController extends Controller
{
    public function index(Request $request)
    {
        if ($request->filled('date_retrait')) {
            $factures = Facture::with('client')
                ->whereDate('date_retrait', $request->date_retrait)
                ->orderBy('date_retrait', 'asc')
                ->get();
        } else {
            $factures = Facture::with('client')
                ->whereNotNull('date_retrait')
                ->orderBy('date_retrait', 'asc') // Ordre croissant
                ->get();
        }

        return view('admin.rendezvous.index', compact('factures'));
    }
}
