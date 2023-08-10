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
        <h1>Add new client</h1>
        <div class="lead">
            Add new client.
        </div>

        <div class="container mt-4">

                @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif

                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="alert aler-danger"> {{ $error }} </li>
                    @endforeach
                </ul>

            <form method="POST" action="">
                @csrf
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input value="{{ old('nom') }}" 
                        type="text" 
                        class="form-control" 
                        name="nom" 
                        placeholder="nom" required>

                    @if ($errors->has('nom'))
                        <span class="text-danger text-left">{{ $errors->first('nom') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="etat" class="form-label">Etat</label>
                    <input value="{{ old('etat') }}"
                        type="text" 
                        class="form-control" 
                        name="etat" 
                        placeholder="Etat" required>
                    @if ($errors->has('etat'))
                        <span class="text-danger text-left">{{ $errors->first('etat') }}</span>
                    @endif

                <div class="mb-3">
                    <label for="telClient" class="form-label">Numero de telephone du client</label>
                    <input value="{{ old('telClient') }}"
                        type="text" 
                        class="form-control" 
                        name="telClient" 
                        placeholder="Numero du telephone du client" required>
                    @if ($errors->has('telClient'))
                        <span class="text-danger text-left">{{ $errors->first('telClient') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="adresse" class="form-label">Adresse</label>
                    <input value="{{ old('adresse') }}"
                        type="text"
                        class="form-control" 
                        name="adresse"
                        placeholder="Adresse" required>
                    @if ($errors->has('adresse'))
                        <span class="text-danger text-left">{{ $errors->first('adresse') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="ville" class="form-label">Ville</label>
                    <input value="{{ old('ville') }}"
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
                    <input value="{{ old('codePostal') }}"
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
                    <input value="{{ old('carteCredit') }}"
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
                    <input value="{{ old('salaire') }}"
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
                    <input value="{{ old('employeur') }}"
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
                    <input value="{{ old('typeCompte') }}"
                        type="text" 
                        class="form-control" 
                        name="typeCompte"
                        placeholder="typeCompte">
                    @if ($errors->has('typeCompte'))
                        <span class="text-danger text-left">{{ $errors->first('typeCompte') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="post" class="form-label">Post</label>
                    <input value="{{ old('post') }}"
                        type="text" 
                        class="form-control" 
                        name="poste"
                        placeholder="Post">
                    @if ($errors->has('post'))
                        <span class="text-danger text-left">{{ $errors->first('post') }}</span>
                    @endif
                </div>
                
                <button type="submit" class="btn btn-primary">Save client</button>
                <a href="{{ route('clients.list') }}" class="btn btn-default">Back</a>
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
