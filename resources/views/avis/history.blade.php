<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>gestion des avis | Navbar & Tabs</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
<!-- avis/history.blade.php -->
@extends('layouts.app')

<div class="bg-light p-4 rounded">
    <div class="lead">
    <h1 class="avi-history-heading"><span style="font-weight: 400;">Avis History for Credit:</span> <span style="font-weight: 400;"> {{ $credit->id }} </span></h1>
    </div>
    <div class="mt-2">
    
    <!-- Display the list of avis for the credit -->
<ul class="avi-list">
    @foreach ($credit->avis as $index => $avi)
        <li class="avi-item">
            <div class="avi-number"><span style="color: #006400; font-weight: 500;">Numero d'avis: </span> <span style="font-weight: 400;">{{ $index + 1 }} </span></div>
            <div class="avi-details">
                <p class="avi-content">l'avis: {{ $avi->contenu }}</p>
                @if ($avi->decision != null)
                <p class="avi-decision"><span style="color: #B22222; font-weight: 400;">La décision: </span> <span style="color: #000000; class="avi-decision-value">{{ $avi->decision }}</span></p>
                @endif
            </div>
        </li>
    @endforeach
</ul>

    </div>
    

</div>
    <!-- Add your custom CSS directly here -->
    <style>
        /* Custom CSS code goes here */
        
        .avi-number {
        color: #006400;
        font-size: 20px; /* Bigger font size */
        }

        .avi-content {
        font-size: 20px;
        color: #333;
        margin-bottom: 5px;
        }

    .avi-decision {
    font-size: 20px;
    color: #FF2400; /* Green color for positive decisions */
    }
        
        /* More styles... */
</style>

        </section>


      </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->


<!-- jQuery -->
<script src="../../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../../plugins/jszip/jszip.min.js"></script>
<script src="../../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../../dist/js/demo.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
