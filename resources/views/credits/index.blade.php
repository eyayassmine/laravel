<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>gestion des credits | Navbar & Tabs</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="layout-navbar-fixed sidebar-mini">
<div class="wrapper">

        @include('layouts.navbar')
        @include('layouts.sidebar')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
     
        @extends('layouts.app')

    
    <h1 class="mb-3">Gestion des credits</h1>

    <div class="bg-light p-4 rounded">
        <h1>Credits</h1>
        <div class="lead">
            Manage your credits here.
            <a href="{{ route('credits.create') }}" class="btn btn-primary btn-sm float-right">Add new credit</a>
        </div>
        
        <div class="mt-2">
        </div>
        <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Id du client</th>
                    <th>Typec</th>
                    <th >Montant</th>
                    <th >Date debut</th>
                    <th >Duree</th>
                    <th >Remboursement</th>
                    <th>Refernce bancaire</th>
                    <th>Nombre des chevaux</th>
                    <th>Date fin</th>
                    <th>Status</th>

                    <th></th> 
                  </tr>
                  </thead>
                  <tbody>
                @foreach($credits as $key=>$credit)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $credit->id_client }}</td>
                        <td>{{ $credit->typec}}</td>
                        <td>{{ $credit->montant }}</td>
                        <td>{{ $credit->datedebut }}</td>
                        <td>{{ $credit->duree }}</td>
                        <td>{{ $credit->remboursement }}</td>
                        <td>{{ $credit->ref_bancaire }}</td>
                        <td>{{ $credit->nb_chevaux }}</td> 
                        <td>{{ $credit->datefin }}</td>
                        <td>{{ $credit->status }}</td>

                       
                    
                        <td>
                            <a href="{{ route('credits.show', ['credit' => $credit->id]) }}" class="btn btn-warning btn-sm">Show</a>
                            <a href="{{ route('credits.edit', $credit->id) }}" class="btn btn-info btn-sm">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['credits.destroy', $credit->id]]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        </td>
                       
                    </tr>
                @endforeach
            </tbody>
      
                </table>

        <div class="d-flex">
            {!! $credits->links() !!}
        </div>

    </div>




        </section>


      </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->


<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
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
