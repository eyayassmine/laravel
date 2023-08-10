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
        <h1>Update client</h1>
        <div class="lead">
            
        </div>
        
        <div class="container mt-4">
            <form method="post" action="{{ route('clients.update', $client->id) }}">
                @method('patch')
                @csrf
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input value="{{ $client->nom }}" 
                        type="text" 
                        class="form-control" 
                        name="nom" 
                        placeholder="Nom" required>

                    @if ($errors->has('nom'))
                        <span class="text-danger text-left">{{ $errors->first('nom') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="etat" class="form-label">Etat</label>
                    <input value="{{ $client->etat }}" 
                        type="text" 
                        class="form-control" 
                        name="etat" 
                        placeholder="Etat" required>

                    @if ($errors->has('etat'))
                        <span class="text-danger text-left">{{ $errors->first('etat') }}</span>
                    @endif
                </div>
                
                <div class="mb-3">
                    <label for="telClient" class="form-label">Numero de telephone du client</label>
                    <input value="{{ $client->telClient }}"
                        type="telClient" 
                        class="form-control" 
                        name="telClient" 
                        placeholder="numero de telephone du client " required>
                    @if ($errors->has('telClient'))
                        <span class="text-danger text-left">{{ $errors->first('telClient') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="adresse" class="form-label">Adresse</label>
                    <input value="{{ $client->adresse }}"
                        type="text" 
                        class="form-control" 
                        name="adresse" 
                        placeholder="Adresse" required>
                    @if ($errors->has('adresse'))
                        <span class="text-danger text-left">{{ $errors->first('adresse') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="ville" class="form-label"> Ville</label>
                    <input value="{{ $client->ville }}"
                        type="text" 
                        class="form-control" 
                        name="ville" 
                        placeholder="Ville" required>
                    @if ($errors->has('ville'))
                        <span class="text-danger text-left">{{ $errors->first('ville') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="codePostal" class="form-label">Code postal</label>
                    <input value="{{ $client->codePostal }}"
                        type="text" 
                        class="form-control" 
                        name="codePostal" 
                        placeholder="Code postal">
                    @if ($errors->has('codePostal'))
                        <span class="text-danger text-left">{{ $errors->first('codePostal') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="carteCredit" class="form-label">Carte credit</label>
                    <input value="{{ $client->carteCredit }}"
                        type="text" 
                        class="form-control" 
                        name="carteCredit"
                        placeholder="Carte credit">
                    @if ($errors->has('carteCredit'))
                        <span class="text-danger text-left">{{ $errors->first('carteCredit') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="salaire" class="form-label">Salaire</label>
                    <input value="{{ $client->salaire }}"
                        type="text" 
                        class="form-control" 
                        name="salaire"
                        placeholder="Salaire">
                    @if ($errors->has('salaire'))
                        <span class="text-danger text-left">{{ $errors->first('salaire') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="employeur" class="form-label">Employeur</label>
                    <input value="{{ $client->employeur }}"
                        type="text" 
                        class="form-control" 
                        name="employeur"
                        placeholder="Employeur">
                    @if ($errors->has('employeur'))
                        <span class="text-danger text-left">{{ $errors->first('employeur') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="typeCompte" class="form-label">Type du compte</label>
                    <input value="{{ $client->typeCompte }}"
                        type="text" 
                        class="form-control" 
                        name="typeCompte"
                        placeholder="Type du compte">
                    @if ($errors->has('typeCompte'))
                        <span class="text-danger text-left">{{ $errors->first('typeCompte') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="poste" class="form-label">Poste</label>
                    <input value="{{ $client->poste }}"
                        type="text"
                        class="form-control" 
                        name="poste"
                        placeholder="Poste">
                    @if ($errors->has('poste'))
                        <span class="text-danger text-left">{{ $errors->first('poste') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Update client</button>
                <a href="{{ route('clients.list') }}" class="btn btn-default">Cancel</button>
            </form>
        </div>

    </div>

        </section>

            <!-- Main content -->

            <!-- /.content -->
      </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../../dist/js/demo.js"></script>
</body>
</html>
