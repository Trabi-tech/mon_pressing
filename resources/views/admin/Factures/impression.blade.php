<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Reçu #{{ $facture->numero }}</title>
    <style>
        body {
            width: 300px; /* largeur imprimante thermique 80mm */
            font-family: monospace;
            font-size: 12px;
            color: #000;
            margin: 0 auto;
            padding: 5px;
        }

        .center {
            text-align: center;
        }

        .separator {
            border-top: 1px dashed #000;
            margin: 10px 0;
        }

        table {
            width: 100%;
            font-size: 11px;
            border-collapse: collapse;
        }

        td, th {
            padding: 2px 0;
        }

        .total {
            font-weight: bold;
            text-align: right;
            margin-top: 10px;
        }

        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body onload="window.print()">

    <div class="center">
        <strong>OROCOM PRESSING</strong><br>
        Abidjan - CI<br>
        Tel: +225 07 00 00 00
    </div>

    <div class="separator"></div>

    <div>
        <strong>Facture N°:</strong> {{ $facture->numero }}<br>
        <strong>Client:</strong> {{ $facture->client->nom }} {{ $facture->client->prenom }}<br>
        <strong>Date:</strong> {{ \Carbon\Carbon::parse($facture->date_facture)->format('d/m/Y') }}
    </div>

    <div class="separator"></div>

    <table>
        <thead>
            <tr>
                <th>Qté</th>
                <th>Article</th>
                <th class="right">PU</th>
                <th class="right">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($facture->details as $detail)
            <tr>
                <td>{{ $detail->quantite }}</td>
                <td>{{ $detail->types_vetements->nom ?? 'N/A' }}</td>
                <td class="right">{{ number_format($detail->prix_unitaire, 0) }}</td>
                <td class="right">{{ number_format($detail->quantite * $detail->prix_unitaire, 0) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="separator"></div>

    <div class="total">
        Total : {{ number_format($facture->total, 0) }} FCFA
    </div>

    <div class="separator"></div>

    <div class="center">
        Merci pour votre confiance !<br>
        {{ now()->format('d/m/Y H:i') }}
    </div>

</body>
</html>
