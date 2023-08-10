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
        <h1>Show avis</h1>
        <div class="lead">
            
        </div>
        <div class="container mt-4">

            <h1>Avis Details</h1>

            <div>
                Id du credit: {{ $avi->id_credit }}
            </div>
            <div>
                l'avis: {{ $avi->contenu }}
            </div>
            <div>
                Décision: {{ $avi->decision }}
            </div>
            <div>
            </div>
        </div>
        <h1>
            Credit Details</h1>
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
                Status: {{ $credit->status }}
            </div>
            <div>
                Date du fin: {{ $credit->datefin }}
            </div>
          
          

    </div>
    <div class="mt-4">
        <a href="{{ route('avis.edit', $avi->id) }}" class="btn btn-info">Edit</a>
        <a href="{{ route('avis.index') }}" class="btn btn-default">Back</a>

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
