<!DOCTYPE html>
<html>
<head>
<title>gestion des credits | Navbar & Tabs</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="bg-light p-4 rounded">
        <h1>Credit</h1>
        <div class="lead">
            
        </div>

            <h1>Credit Details</h1>

            <div>
                Id du client: {{ $credit->id_client }}
            </div>
            <div>
                Typec: {{ $credit->typec }}
            </div>
            @if ($credit->typec == 1)
                credit voiture!
            @else
                credit direct!
            @endif
            <div>
                Montant: {{ $credit->montant }}
            </div>
            <div>
                Date du debut: {{ $credit->datedebut }}
            </div>
            <div>
                Duree: {{ $credit->duree }}
            </div>
            <div>
                Remboursement: {{ $credit->remboursement }}
            </div>
            <div>
                Reference bancaire: {{ $credit->ref_bancaire }}
            </div>
            @if ($credit->typec == 1)
            nombre de chevaux: {{ $credit->nb_chevaux }}
            @endif
            <div>
                Date du fin: {{ $credit->datefin }}
            </div>
            <div>
            </div>
        <h1>Client Details</h1>
        <div>
                Nom: {{ $client->nom }}
            </div>
            <div>
                Etat: {{ $client->etat }}
            </div>
            <div>
                Numero du telephone: {{ $client->telClient }}
            </div>
            <div>
                Adresse: {{ $client->adresse }}
            </div>
            <div>
                Ville: {{ $client->ville }}
            </div>
            <div>
                Code Postal: {{ $client->codePostal }}
            </div>
            <div>
                Carte Crédit: {{ $client->carteCredit }}
            </div>
            <div>
                Salaire: {{ $client->salaire }}
            </div>
            <div>
                Employeur: {{ $client->employeur }}
            </div>
            <div>
                Type du compte: {{ $client->typeCompte }}
            </div>
            <div>
                Poste: {{ $client->poste }}
            </div>
          

    </div>

</body>
</html>


