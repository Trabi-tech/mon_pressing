@extends('layouts.master')

@section('content')
<div class="container">
    <div class="page-inner mt-4">
        <h3 class="fw-bold mb-4">Détails du client</h3>

        <div class="card">
            <div class="card-body">
                <p><strong>Nom :</strong> {{ $client->nom }}</p>
                <p><strong>Prénom :</strong> {{ $client->prenom }}</p>
                <p><strong>Contact :</strong> {{ $client->contact }}</p>
                <p><strong>Créé le :</strong> {{ $client->created_at->format('d/m/Y H:i') }}</p>
            </div>
        </div>

        <a href="{{ route('Clients.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
    </div>
</div>
@endsection
