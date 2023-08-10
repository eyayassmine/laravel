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
        <h1>Add new credit</h1>

        <div class="container mt-4">
            <form method="POST" action="">
                @csrf
                <div class="mb-3">
                    <label for="id_client" class="form-label">IdClient</label>
                    <input value="{{ old('id_client') }}" 
                        type="text" 
                        class="form-control" 
                        name="id_client" 
                        placeholder="Id_client" required>

                    @if ($errors->has('id_client'))
                        <span class="text-danger text-left">{{ $errors->first('id_client') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="typec" class="form-label">Typec</label>
                    <input value="{{ old('typec') }}"
                        type="text"
                        class="form-control" 
                        name="typec"
                        placeholder="Typec" required>
                    @if ($errors->has('typec'))
                        <span class="text-danger text-left">{{ $errors->first('typec') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="montant" class="form-label">Montant</label>
                    <input value="{{ old('montant') }}"
                        type="text"
                        class="form-control"
                        name="montant"
                        placeholder="Montant" required>
                    @if ($errors->has('montant'))
                        <span class="text-danger text-left">{{ $errors->first('montant') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="datedebut" class="form-label">Date du debut</label>
                    <input value="{{ old('datedebut') }}"
                        type="date"
                        class="form-control" 
                        name="datedebut" 
                        placeholder="Date du debut" required>
                    @if ($errors->has('datedebut'))
                        <span class="text-danger text-left">{{ $errors->first('datedebut') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="duree" class="form-label">Duree</label>
                    <input value="{{ old('duree') }}"
                        type="text" 
                        class="form-control" 
                        name="duree" 
                        placeholder="Duree" required>
                    @if ($errors->has('duree'))
                        <span class="text-danger text-left">{{ $errors->first('duree') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="remboursement" class="form-label">Remboursement</label>
                    <input value="{{ old('remboursement') }}"
                        type="text" 
                        class="form-control" 
                        name="remboursement" 
                        placeholder="Remboursement">
                    @if ($errors->has('remboursement'))
                        <span class="text-danger text-left">{{ $errors->first('remboursement') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="ref_bancaire" class="form-label">Reference bancaire</label>
                    <input value="{{ old('ref_bancaire') }}"
                        type="text"
                        class="form-control" 
                        name="ref_bancaire" 
                        placeholder="Reference bancaire">
                    @if ($errors->has('ref_bancaire'))
                        <span class="text-danger text-left">{{ $errors->first('ref_bancaire') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="nb_chevaux" class="form-label">Nombre de chevaux</label>
                    <input value="{{ old('nb_chevaux') }}"
                        type="text" 
                        class="form-control"
                        name="nb_chevaux" 
                        placeholder="Nombre de chevaux">
                    @if ($errors->has('nb_chevaux'))
                        <span class="text-danger text-left">{{ $errors->first('nb_chevaux') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="datefin" class="form-label">Date du fin</label>
                    <input value="{{ old('datefin') }}"
                        type="date"
                        class="form-control" 
                        name="datefin" 
                        placeholder="Date" required>
                    @if ($errors->has('datefin'))
                        <span class="text-danger text-left">{{ $errors->first('datefin') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Save credit</button>
                <a href="{{ route('credits.index') }}" class="btn btn-default">Back</a>
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
