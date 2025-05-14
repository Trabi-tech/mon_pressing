@extends('layouts.master')

@section('content')
<div class="container">
    <div class="page-inner mt-4">
        <h3 class="fw-bold mb-4">Détails du client</h3>
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                    <div>
                        <h3 class="fw-bold mb-3"></strong> {{ $client->nom }} {{ $client->prenom }}</h3>
                    </div>
                    <div class="ms-md-auto py-2 py-md-0">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-round" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Crée une facture
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ms-md-auto py-2 py-md-0 ">
        <a href="{{ route('Clients.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
    </div>
</div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            ...
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        </div>
    </div>
@endsection
