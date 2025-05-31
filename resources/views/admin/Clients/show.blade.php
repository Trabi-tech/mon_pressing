@extends('layouts.master')

@section('content')
<div class="container">
    <div class="page-inner mt-4">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Détails du client</h3>
            </div>
            <div class="ms-md-auto py-2 py-md-0">
                <a href="{{ route('Factures.create', $client->slug_client) }}" class="btn btn-success btn-round">
                    Créer une facture
                </a>
            </div>
        </div>

        <!-- Liste des factures -->
        @if($client->factures->count())
        <div class="card mt-4">
            <div class="card-header bg-light">
                <h5 class="fw-bold mb-0">Factures de {{ $client->nom }} {{ $client->prenom }}</h5>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Numero facture</th>
                            <th>Total</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($client->factures as $facture)
                            <tr>
                                <td>{{ $facture->id }}</td>
                                <td>{{ \Carbon\Carbon::parse($facture->date_facture)->format('d/m/Y') }}</td>
                                <td>{{ $facture->numero }}</td>
                                <td>{{ number_format($facture->total, 2) }} FCFA</td>
                                <td>
                                    <a href="{{ route('Factures.show', $facture->id) }}" class="btn btn-sm btn-info">Voir</a>
                                    <a href="" class="btn btn-sm btn-secondary">PDF</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @else
        <div class="alert alert-info mt-4">
            Ce client n’a pas encore de factures.
        </div>
        @endif

        <!-- Bouton retour -->
        <div class="ms-md-auto py-2 py-md-0 ">
            <a href="{{ route('Clients.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
        </div>
    </div>
</div>
@endsection
