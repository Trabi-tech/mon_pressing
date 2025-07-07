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
        body {
            margin: 0;
            padding: 0;
            background-image: url('{{ asset('assets/img/presentation_lav.png') }}'); /* Image de fond (remplaçable) */
            background-size: cover;
            background-position: center;
            height: 100vh;
            color: #fff;
            font-family: 'Segoe UI', sans-serif;
        }

        .overlay {
            background: rgba(0, 0, 0, 0.6); /* assombrit l’image */
            height: 100%;
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
        }

        .content {
            position: relative;
            z-index: 2;
            text-align: center;
            max-width: 700px;
            margin: auto;
            padding-top: 15%;
        }

        h1 {
            font-size: 3rem;
            font-weight: bold;
        }

        p {
            font-size: 1.2rem;
            margin-top: 20px;
        }

        .btn-primary {
            margin-top: 30px;
            padding: 10px 30px;
            font-size: 1.1rem;
            border-radius: 30px;
        }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <div class="content">
        <h1>Bienvenue sur <span class="text-warning">MaLaveriePro</span></h1>
        <p>
            La solution simple et efficace pour gérer votre laverie.<br>
            Enregistrez vos clients, suivez vos factures et gérez vos rendez-vous de retrait en toute simplicité.
        </p>
        <a href="{{ route('login') }}" class="btn btn-primary">Commencer</a>
    </div>
</body>
</html>
