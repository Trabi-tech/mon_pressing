@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="page-inner">
        <h4 class="mb-4">Détails de la facture #{{ $facture->numero }}</h4>

        <div class="mb-3">
            <strong>Date :</strong>
            {{ \Carbon\Carbon::parse($facture->date_facture)->format('d/m/Y') }}
        </div>

        <div class="mb-3">
            <strong>Client :</strong>
            {{ $facture->client->nom }}
        </div>

        <h5 class="mt-4">Articles</h5>
        <table class="table table-bordered">
            <thead>
                <tr class="table-secondary">
                    <th>Catégorie</th>
                    <th>Type de vêtement</th>
                    <th>Quantité</th>
                    <th>Prix unitaire</th>
                    <th>Sous-total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($facture->details as $detail)
                    <tr>
                        <td>{{ $detail->categorie->nom ?? 'Non défini'}}</td>
                        <td>{{ $detail->types_vetements->nom ?? 'Non défini' }}</td>
                        <td>{{ $detail->quantite }}</td>
                        <td>{{ number_format($detail->prix_unitaire, 2) }} FCFA</td>
                        <td>{{ number_format($detail->quantite * $detail->prix_unitaire, 2) }} FCFA</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-end fw-bold">
            Total : {{ number_format($facture->total, 2) }} FCFA
        </div>

        <a href="{{ route('Clients.show',$client->slug_client) }}" class="btn btn-secondary mt-3">Retour au client</a>
    </div>
</div>
@endsection
