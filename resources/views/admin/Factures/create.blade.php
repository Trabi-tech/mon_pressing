@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <div class="page-inner">
        <h3 class="fw-bold mb-4">Créer une facture pour {{ $client->nom }} {{ $client->prenom }}</h3>
        <form action="{{ route('Factures.store') }}" method="POST">
            @csrf
            <input type="hidden" name="client_id" value="{{ $client->id }}">

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="date" class="form-label">Date de la facture</label>
                    <input type="date" name="date_facture" class="form-control" required>
                </div>

                <div class="col-md-1"></div> <!-- ESPACE -->

                <div class="col-md-4 mb-3">
                    <label for="date" class="form-label">Date retrait</label>
                    <input type="date" name="date_retrait" class="form-control" required>
                </div>
            </div>


            <h5 class="fw-bold mt-4">Articles</h5>
            <div id="articles-container">
                <div class="row article-item mb-3">
                    <div class="col-md-3">
                        <label for="categorie_id[]" class="form-label">Catégorie</label>
                        <select name="categorie_id[]" class="form-control categorie-select" required>
                            <option value="">-- Choisir une catégorie --</option>
                            @foreach($categories as $categorie)
                                <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label for="type_vetement_id[]" class="form-label">Type de vêtement</label>
                        <select name="type_vetement_id[]" class="form-control type-select" required>
                            <option value="">-- Choisir un type --</option>
                            @foreach($types as $type)
                                <option value="{{ $type->id }}" data-categorie="{{ $type->categorie_id }}">
                                    {{ $type->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label for="quantite[]" class="form-label">Quantité</label>
                        <input type="number" name="quantite[]" class="form-control" required>
                    </div>

                    <div class="col-md-2">
                        <label for="prix_unitaire[]" class="form-label">Prix unitaire</label>
                        <input type="number" step="0.01" name="prix_unitaire[]" class="form-control" required>
                    </div>
                </div>
            </div>

            <button type="button" id="add-article" class="btn btn-sm btn-success my-3">+ Ajouter un article</button>

            <div class="col-md-4 offset-md-8">
                <div class="form-group">
                    <label for="total" class="form-label fw-bold">Total facture</label>
                    <!-- Affichage lisible -->
                    <input type="text" id="total" class="form-control" readonly>
                    <!-- Valeur réelle à envoyer au serveur -->
                    <input type="hidden" name="total" id="total-hidden" readonly>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-4">Enregistrer la facture</button>
        </form>
    </div>
</div>

<script>
    function calculerTotal() {
    let total = 0;
    document.querySelectorAll('.article-item').forEach(function (row) {
        const quantite = parseFloat(row.querySelector('input[name="quantite[]"]').value) || 0;
        const prix = parseFloat(row.querySelector('input[name="prix_unitaire[]"]').value) || 0;
        total += quantite * prix;
    });

    // Remplir le champ caché et le champ affiché
    document.getElementById('total').value = total.toFixed(2) + ' FCFA'; // Pour le backend
    document.getElementById('total-hidden').value = total.toFixed(2) ; // Pour l’utilisateur
}

    // Filtrage des types de vêtements selon la catégorie sélectionnée
    document.addEventListener('change', function (e) {
        if (e.target.classList.contains('categorie-select')) {
            const selectedCategorie = e.target.value;
            const parentRow = e.target.closest('.article-item');
            const typeSelect = parentRow.querySelector('.type-select');

            typeSelect.querySelectorAll('option').forEach(function (option) {
                const catId = option.getAttribute('data-categorie');
                option.style.display = (!catId || catId === selectedCategorie) ? 'block' : 'none';
            });

            typeSelect.value = ''; // Réinitialiser le type
        }
    });

    // Mise à jour du total lors de la saisie
    document.getElementById('articles-container').addEventListener('input', calculerTotal);

    // Ajout dynamique d’un article
    document.getElementById('add-article').addEventListener('click', function () {
        const container = document.getElementById('articles-container');
        const article = container.firstElementChild.cloneNode(true);
        article.querySelectorAll('input, select').forEach(el => el.value = '');
        container.appendChild(article);
        calculerTotal(); // recalculer après ajout
    });

    // Calcul initial au chargement
    window.addEventListener('DOMContentLoaded', calculerTotal);
</script>


@endsection
