<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh; background: #f0f2f5;">
    <div class="card shadow p-4 rounded-4" style="width: 100%; max-width: 500px; background: white; border: none;">
        <h4 class="mb-4 text-center" style="font-weight: bold; color: #2c3e50;">Enregistrer votre laverie</h4>

        <form action="{{ route('laverie.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nom" class="form-label" style="font-weight: 500;">Nom de la laverie</label>
                <input type="text" name="nom" class="form-control rounded-pill" required placeholder="Ex : Laverie Express">
            </div>

            <div class="mb-3">
                <label for="adresse" class="form-label" style="font-weight: 500;">Adresse</label>
                <input type="text" name="adresse" class="form-control rounded-pill" required placeholder="Ex : Cocody, Abidjan">
            </div>

            <div class="mb-3">
                <label for="telephone" class="form-label" style="font-weight: 500;">telephone</label>
                <input type="text" name="telephone" class="form-control rounded-pill" required placeholder="Ex : 00 00 00 00 00">
            </div>

            <button type="submit" class="btn btn-primary w-100 rounded-pill" style="background-color: #3498db; border: none;">
                Enregistrer
            </button>
        </form>
    </div>
</div>
