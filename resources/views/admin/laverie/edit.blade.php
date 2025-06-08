@extends('layouts.master')

@section('content')
    <div class="container">

        <div class="page-inner">

            <h3>Modifier votre laverie</h3>

            <form action="{{ route('laverie.update', $laverie->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div>
                    <label for="nom">Nom de la laverie</label><br>
                    <input type="text" name="nom" value="{{ old('nom', $laverie->nom) }}" required>
                </div>

                <div>
                    <label for="adresse">Adresse</label><br>
                    <input type="text" name="adresse" value="{{ old('adresse', $laverie->adresse) }}" required>
                </div>

                <div>
                    <label for="telephone">Téléphone</label><br>
                    <input type="text" name="telephone" value="{{ old('telephone', $laverie->telephone) }}" required>
                </div>

                <br>
                <button type="submit">Mettre à jour</button>
            </form>

        </div>
    </div>
@endsection


