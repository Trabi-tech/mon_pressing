<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MaLaveriePro</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo_128x128.png') }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body, html {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', sans-serif;
        }

        .background {
            background-image: url('https://images.unsplash.com/photo-1581578017420-3e56f9b9b5e3');
            background-size: cover;
            background-position: center;
            height: 100vh;
            position: relative;
        }

        .overlay {
            background: rgba(0, 0, 0, 0.6);
            height: 100%;
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1;
        }

        .form-container {
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .card {
            background-color: white;
            border: none;
            max-width: 500px;
            width: 100%;
        }

        h4 {
            color: #2c3e50;
        }

        .form-label {
            font-weight: 500;
        }

        .btn-primary {
            background-color: #3498db;
            border: none;
        }
    </style>
</head>
<body>
    <div class="background">
        <div class="overlay"></div>
        <div class="form-container">
            <div class="card shadow p-4 rounded-4">
                <h4 class="mb-4 text-center fw-bold">Enregistrer votre laverie</h4>

                <form action="{{ route('laverie.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <!-- Colonne gauche -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nom1" class="form-label">Nom de la laverie</label>
                                <input type="text" id="nom1" name="nom1" class="form-control rounded-pill" required placeholder="Ex : Laverie Express">
                            </div>

                            <div class="mb-3">
                                <label for="ville" class="form-label">Ville</label>
                                <select id="ville" name="ville" class="form-control rounded-pill" required>
                                    <option value="">-- Sélectionnez une ville --</option>
                                    <option value="Abidjan">Abidjan</option>
                                    <option value="Yamoussoukro">Yamoussoukro</option>
                                    <option value="Bouaké">Bouaké</option>
                                    <option value="San Pedro">San Pedro</option>
                                    <option value="Daloa">Daloa</option>
                                    <option value="Korhogo">Korhogo</option>
                                    <option value="Man">Man</option>
                                    <option value="Gagnoa">Gagnoa</option>
                                    <option value="Abengourou">Abengourou</option>
                                    <option value="Bondoukou">Bondoukou</option>
                                    <option value="Divo">Divo</option>
                                    <option value="Odienné">Odienné</option>
                                    <option value="Séguéla">Séguéla</option>
                                    <option value="Soubré">Soubré</option>
                                    <option value="Aboisso">Aboisso</option>
                                    <option value="Agboville">Agboville</option>
                                    <option value="Toumodi">Toumodi</option>
                                    <option value="Tiassalé">Tiassalé</option>
                                    <option value="Daoukro">Daoukro</option>
                                    <option value="Bingerville">Bingerville</option>
                                    <!-- Tu peux en ajouter d'autres ici -->
                                </select>
                            </div>


                            <div class="mb-3">
                                <label for="telephone1" class="form-label">commun</label>
                                <input type="text" id="telephone1" name="telephone1" class="form-control rounded-pill" required placeholder="Ex : 00 00 00 00 00">
                            </div>
                        </div>

                        <!-- Colonne droite -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nom2" class="form-label">Nom de la laverie</label>
                                <input type="text" id="nom2" name="nom2" class="form-control rounded-pill" required placeholder="Ex : Laverie Express 2">
                            </div>

                            <div class="mb-3">
                                <label for="adresse2" class="form-label">Adresse</label>
                                <input type="text" id="adresse2" name="adresse2" class="form-control rounded-pill" required placeholder="Ex : Yopougon, Abidjan">
                            </div>

                            <div class="mb-3">
                                <label for="telephone2" class="form-label">Téléphone</label>
                                <input type="text" id="telephone2" name="telephone2" class="form-control rounded-pill" required placeholder="Ex : 01 02 03 04 05">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 rounded-pill mt-3">
                        Enregistrer
                    </button>
                </form>

            </div>
        </div>
    </div>
</body>
</html>
