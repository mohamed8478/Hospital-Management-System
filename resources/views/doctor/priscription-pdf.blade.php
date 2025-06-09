<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescription Médicale</title>
    <style>

        body {
            font-family: Arial, sans-serif;
            font-size: 11px; /* Reduced from 12px */
            margin: 0;
        }




        /* HEADER */
        .pdf-header {
            margin-top: 80px;
            border-bottom: 1px solid #333;
            padding-bottom: 5px;
            margin-bottom: 10px;
            page-break-inside: avoid;
        }

        .doctor-info {
            display: inline-block;
            width: 45%;
        }
        @page {
                size: A5;
                margin: 5mm;  /* Reduced from 10px */
            }

        .doctor-info h1 {
            font-size: 14px; /* Reduced */
            margin: 0;
            color: #1f2937;
        }

        .doctor-info p {
            font-size: 11px;
            margin: 2px 0;
            color: #555;
        }

        .clinic-logo {
            display: inline-block;
            width: 20%;
            text-align: center;
            position: relative;
            right:27px;
        }

        .clinic-logo img {
            height: 50px; /* Reduced */
            width: auto;
        }

        .clinic-info {
            display: inline-block;
            width: 33%;
            text-align: right;
            font-size: 11px;
        }
        .clinic-info h1 {
            font-size: 14px; /* Reduced */
            margin: 0;
            color: #1f2937;
        }
        .clinic-info p{
            font-size: 11px;
            margin: 2px 0;
            color: #555;
        }

        .prescription-date {
            text-align: center;
            font-weight: bold;
            font-size: 12px; /* Reduced */
            margin: 10px 0;
        }

        /* PATIENT INFO */
        .patient-section {
            border-top: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
            padding: 5px 0; /* Reduced */
            margin-bottom: 10px;
            page-break-inside: avoid;
        }

        .patient-header h2 {
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 3px;
        }

        .patient-details {
            margin: 0;
            font-size: 11px;
        }

        .patient-details p {
            display: inline-block;
            width: 32%;
            margin: 0;
        }

        /* PRESCRIPTION */
        .prescription-section {
            page-break-inside: avoid;
        }

        .prescription-section h2 {
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .extras-grid {
            margin-bottom: 5px;
            page-break-inside: avoid;
        }

        .instructions-section, .notes-section {
            width: 48%;
            display: inline-block;
            vertical-align: top;
        }

        /* MEDICATIONS TABLE */
        .medications-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 11px;
            page-break-inside: avoid;
        }

        .medications-table thead {
            background-color: #f2f2f2;
        }

        .medications-table th, .medications-table td {
            padding: 4px; /* Reduced */
            border: 1px solid #ccc;
            text-align: left;
        }

        .empty-row {
            text-align: center;
            padding: 6px;
            font-style: italic;
            color: #666;
        }

        /* FOLLOW-UP */
        .follow-up {
            font-size: 11px;
            margin-top: 8px;
        }

        .follow-up span {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="pdf-container">
        <!-- HEADER -->
        <div class="pdf-header">
            <div class="doctor-info">
                <h1>{{ optional($doctor)->name }}</h1>
                <p>{{ $doctor->specialization ?? 'Spécialité Non Précisée' }}</p>
                <p>No. RPPS: 10003456789</p>
            </div>
            <div class="clinic-logo">
                <img src="{{ public_path('images/pngegg.png') }}" alt="Logo">
            </div>
            <div class="clinic-info">
                <h1><strong>Hôpital MOHAMMED V</h1>
                <p>Rue 38, B.P. : 70, Hay Anas, Safi</p>
                <p>+212 5.24.62.84.26</p>
            </div>
        </div>

        <!-- PRESCRIPTION DATE -->
        <p class="prescription-date">Date: {{ now()->format('d/m/Y') }}</p>

        <!-- PATIENT INFO -->
        <div class="patient-section">
            <div class="patient-header">
                <h2 style="margin-bottom: 12px">PATIENT</h2>
            </div>
            <div class="patient-details">
                <p><span>Nom:</span> {{ optional($patient)->name }}</p>
                <p><span>Âge/Sexe:</span> {{ $patient->age ?? 'N/A' }} ans  / {{ $patient->gender ?? 'N/A' }}</p>
                <p><span>Tél:</span> {{ $patient->phone_num ?? 'Non Disponible' }}</p>
            </div>
        </div>

        <!-- PRESCRIPTION -->
        <div class="prescription-section">
            <div class="extras-grid">
                <div class="instructions-section">
                    <h2>INSTRUCTIONS</h2>
                    <p class="instructions-list">{{ $instruction }}</p>
                </div>
                <div class="notes-section">
                    <h2>REMARQUES</h2>
                    <p class="doctor-notes">{{ $doctorNotes }}</p>
                </div>
            </div>

            <!-- MEDICATIONS TABLE -->
            <table class="medications-table">
                <thead>
                    <tr>
                        <th>Médicament</th>
                        <th>Dosage</th>
                        <th>Durée</th>
                    </tr>
                </thead>
                <tbody>
                    @if($selectedMedications && count($selectedMedications))
                        @foreach ($selectedMedications as $medication)
                        <tr>
                            <td>{{ $medication['name'] }}</td>
                            <td>{{ $medication['quantity'] }}</td>
                            <td>{{ $medication['frequence'] }}</td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3" class="empty-row">Aucun médicament sélectionné</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <!-- FOLLOW-UP -->
        <p class="follow-up"><span>Date de suivi:</span> {{ $nextDate }}</p>
    </div>
</body>
</html>
