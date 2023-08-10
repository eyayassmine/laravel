





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>gestion des credits | Navbar & Tabs</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../../plugins/fontawesome-free/css/all.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../../../plugins/sweetalert2/sweetalert2.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../../../plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body class="layout-navbar-fixed sidebar-mini">
<div class="wrapper">

        @include('layouts.navbar')
        @include('layouts.sidebar')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
     
    <div class="bg-light p-4 rounded">
        <h1>Show credit</h1>
        <div class="lead">
            
        </div>
        <div class="container mt-4">

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
                Date: {{ $credit->date }}
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
    <div class="mt-4">
        <a href="{{ route('credits.index') }}" class="btn btn-default">Back</a>
    </div>

        </section>


      </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../../dist/js/demo.js"></script>
</body>
</html>



