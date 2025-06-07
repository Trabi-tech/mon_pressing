@extends('layouts.master')

@section('content')
<div class="container">
    <div class="page-inner">
        <h3>Liste des rendez-vous (retraits)</h3>

        {{-- Formulaire de recherche --}}
        <form method="GET" action="{{ route('rendezvous.index') }}" class="mb-4">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="date_retrait" class="form-label">Date de retrait</label>
                    <input type="date" name="date_retrait" class="form-control" value="{{ request('date_retrait') }}" required>
                </div>
                <div class="col-md-2 mb-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary">Rechercher</button>
                </div>
            </div>
        </form>

        {{-- Affichage des résultats --}}
        @if(count($factures))
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>Client</th>
                        <th>Numéro facture</th>
                        <th>Date Facture</th>
                        <th>Date Retrait</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($factures as $facture)
                        <tr>
                            <td>{{ $facture->client->nom }} {{ $facture->client->prenom }}</td>
                            <td>#{{ $facture->numero }}</td>
                            <td>{{ \Carbon\Carbon::parse($facture->date_facture)->format('d/m/Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($facture->date_retrait)->format('d/m/Y') }}</td>
                            <td>{{ number_format($facture->total, 2) }} FCFA</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @elseif(request('date_retrait'))
            <p class="mt-4">Aucun retrait prévu pour cette date.</p>
        @endif
    </div>
</div>
@endsection
