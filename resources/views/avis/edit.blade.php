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
        <h1>Update avis</h1>
        <div class="lead">
            
        </div>
        
        <div class="container mt-4">
            <form method="post" action="{{ route('avis.update', $avi->id) }}">
                @method('patch')
                @csrf
                <div class="mb-3">
                    <label for="contenu" class="form-label">éditer votre avis</label>
                    <input value="{{ $avi->contenu }}" 
                        type="text" 
                        class="form-control" 
                        name="contenu"
                        placeholder="Votre avis" required>
                    @if ($errors->has('contenu'))
                        <span class="text-danger text-left">{{ $errors->first('contenu') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="decision" class="form-label">Votre Décision</label>
                    <input value="{{ $avi->decision }}" 
                        type="text" 
                        class="form-control" 
                        name="decision"
                        placeholder="Votre décision" required>
                    @if ($errors->has('decision'))
                        <span class="text-danger text-left">{{ $errors->first('decision') }}</span>
                    @endif
                </div>
                 <button type="submit" class="btn btn-primary">Update avis</button>
                <a href="{{ route('avis.index') }}" class="btn btn-default">Cancel</button>
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
