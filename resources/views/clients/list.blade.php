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
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../../plugins/sweetalert2/sweetalert2.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">
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
        <h1>Clients</h1>
        <div class="lead">
            Manage your clients here.
            <a href="{{ route('clients.create') }}" class="btn btn-primary btn-sm float-right">Add new client</a>
        </div>
        
        <div class="mt-2">
        @include('layouts.partials.messages')

        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Etat</th>
                <th>Numero du telephone du client</th>
                <th>Adresse</th>
                <th>Ville</th>
                <th>Code postal</th>
                <th>Carte credit</th>
                <th>Salaire</th>
                <th>Employeur</th>
                <th>Type du compte</th>
                <th>Poste</th>
                <th ></th>    
            </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                    <tr>
                        <th scope="row">{{ $client->id }}</th>
                        <td>{{ $client->nom }}</td>
                        <td>{{ $client->etat }}</td>
                        <td>{{ $client->telClient }}</td>
                        <td>{{ $client->adresse }}</td>
                        <td>{{ $client->ville }}</td>
                        <td>{{ $client->codePostal }}</td>
                        <td>{{ $client->carteCredit }}</td>
                        <td>{{ $client->salaire }}</td>
                        <td>{{ $client->employeur}}</td>
                        <td>{{ $client->typeCompte}}</td>
                        <td>{{ $client->poste}}</td>

                        <td class="lead"><a href="{{ route('clients.show', $client->id) }}" class="btn btn-warning btn-sm">Show</a></td>
                        <td class="lead"><a href="{{ route('clients.edit', $client->id) }}" class="btn btn-info btn-sm">Edit</a></td>
                        <td>
                            {!! Form::open(['method' => 'DELETE','route' => ['clients.destroy', $client->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex">
            {!! $clients->links() !!}
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
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>

