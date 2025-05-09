@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
            <h3 class="fw-bold mb-3">listes des clients</h3>
            </div>
        </div>
        <form action="{{ route('Clients.store') }}" method="POST" class="mt-4">
            @csrf
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" required>
            </div>

            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" required>
            </div>

            <div class="mb-3">
                <label for="contact" class="form-label">Contact</label>
                <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact" required>
            </div>

            <button type="submit" class="btn btn-primary btn-round">Enregistrer</button>
        </form>

        </div>
    </div>
@endsection

