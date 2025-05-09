@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="page-inner">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
            <h3 class="fw-bold mb-3">Modifier les information du client</h3>
            </div>
        </div>
        <form action="{{ route('Clients.update') }}" method="POST" class="mt-4">
            @csrf
            <div class="mb-3" >
                <label for="slug_joueur"class="form-label"></label>
                <input type="hidden" name="slug_client" value="{{ $client->slug_client }}"
                class="form-control">
            </div>
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{ $client->nom }}" required>
            </div>

            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" value="{{ $client->prenom }}" required>
            </div>

            <div class="mb-3">
                <label for="contact" class="form-label">Contact</label>
                <input type="text" class="form-control" id="contact" name="contact" value="{{ $client->contact }}" required>
            </div>

            <button type="submit" class="btn btn-primary btn-round">Modifier</button>
        </form>

        </div>
    </div>
@endsection
