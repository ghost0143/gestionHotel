@extends('layout')

@section('content')

<main id="main" class="main">
    <div class="pagetitle">
      @if(session('success'))
            <div class="alert alert-success" role="alert" id="success-message">{{ session('success') }}</div>
        @endif
        @if(session('danger'))
            <div class="alert alert-danger" role="alert" id="success-message">{{ session('danger') }}</div>
        @endif
      <h1>Client</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">Gestion des clients</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <a href="{{ route('client.createForm') }}" class="btn btn-success">Nouveau client</a>
        <form action="{{ route('client.search') }}" method="get" class="row g-3 py-3">
          <div class="col-auto">
              <input type="text" name="nom" class="form-control" id="inputPassword2" placeholder="Nom du client">
          </div>
          <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Faire une recherche</button>
          </div>
        </form>
        <div class="row py-3">
          <div class="col-lg-12">
            <!-- Default Table -->
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nom</th>
              <th scope="col">Prénom</th>
              <th scope="col">Sexe</th>
              <th scope="col">Type</th>
              <th scope="col">Pays</th>
              <th scope="col">Carte</th>
              <th scope="col">Modifier</th>
              <th scope="col">Voir</th>
              <th scope="col">Supprimer</th>
            </tr>
          </thead>
          <tbody>
            @if ($clients->isEmpty())
              <td colspan="10">Aucune donnée trouvé</td>
            @else
            @foreach ($clients as $client)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $client->nom }}</td>
              <td>{{ $client->prenom }}</td>
              <td>{{ $client->sexe }}</td>
              <td>{{ $client->type }}</td>
              <td>{{ $client->pays }}</td>
              <td>{{ $client->carte }}</td>
              <td><a href="{{ route('client.edit', ['id' => $client->id]) }}"><img src="./assets/img/stylo.png" alt=""></a></td>
              <td><a href="{{ route('client.view', ['id' => $client->id]) }}"><img src="./assets/img/voir.png" alt=""></a></td>
              <td>
                <a class="delete-consignateur" data-bs-toggle="modal" data-bs-target="#disablebackdrop{{ $client->id }}" href="#">
                    <img src="{{ asset('./assets/img/supprimer.png') }}" alt="">
                </a>
            </td>
        </tr>

        <!-- Modal pour le consignateur en cours -->
        <div class="modal fade" id="disablebackdrop{{ $client->id }}" tabindex="-1" data-bs-backdrop="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirmation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Etes-vous sûr de vouloir supprimer le client <b>{{ $client->nom }} {{ $client->prenom }}</b> ?
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-primary" data-bs-dismiss="modal">Retour</a>
                        <form action="{{ route('client.destroy', ['id' => $client->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endif

            
            
          </tbody>
        </table>
        <!-- End Default Table Example -->

        <!-- Pagination with icons -->
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav><!-- End Pagination with icons -->
  
          </div>
        </div>
      </section>
  </main><!-- End #main -->
@endsection