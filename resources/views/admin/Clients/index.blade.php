@extends('layouts.master')

@section('content')

    <style>
        .table th, .table td {
            width: 25%;
            text-align: center;
            /* vertical-align: middle; */
        }
    </style>

    <div class="container">

        <div class="page-inner">
            <div
                class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                <h3 class="fw-bold mb-3">listes des clients</h3>
                </div>
                <div class="ms-md-auto py-2 py-md-0">
                <a href="{{ route('Clients.create') }}" class="btn btn-primary btn-round">Ajouter de nouveaux clients</a>
                </div>
            </div>
            <div class="container mt-6">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Nom</th>
                      <th>Prénom</th>
                      <th>Contact</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($clients as $client)
                        <tr>
                        <td>{{ $client->nom }}</td>
                        <td>{{ $client->prenom }}</td>
                        <td>{{ $client->contact }}</td>
                        <td>
                            <a href="{{ route('Clients.edit', $client->slug_client) }}" class="btn btn-primary btn-round">Modifier</a>
                            <a href="{{ route('Clients.destroy', $client->slug_client) }}" class="btn btn-danger btn-round">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
