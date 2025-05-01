@extends('layouts.master')

@section('content')

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
                    <tr>
                    <td>John</td>
                    <td>Doe</td>
                    <td>john@example.com</td>
                    <td>
                        <a href="#" class="btn btn-primary btn-round">Modifier</a>
                        <a href="#" class="btn btn-danger btn-round">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- <div class="container">
        <div class="page-inner">
            <form action="{{ route('Clients.store') }}" method="POST">
                @csrf
                <input type="text" name="nom" placeholder="Nom" required>
                <input type="text" name="prenom" placeholder="Prénom" required>
                <input type="text" name="contact" placeholder="Contact" required>
                <button type="submit">Enregistrer</button>
            </form>
        </div>
    </div> --}}
    
@endsection

