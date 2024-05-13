@extends('layout')

@section('content')
    <main id="main" class="main">
        @if(session('success'))
            <div class="alert alert-success" role="alert" id="success-message">{{ session('success') }}</div>
        @endif
            @if(session('danger'))
                <div class="alert alert-danger" role="alert" id="success-message">{{ session('danger') }}</div>
            @endif
        <div class="pagetitle">
            <h1>Reservation</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Reservation</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->





        <section class="section">
            <div class="row mb-3">
                <div class="col-sm-8">
                    <a href="{{ route('reservation.formCreate') }}" class="btn btn-success">Faire une reservation</a>
                </div>
            </div>
            <form method="GET" action="{{ route('reservation.search') }}" class="row g-3 py-3">
                <div class="col-auto">
                    <input type="text" name="nom" class="form-control" id="inputPassword2" placeholder="Nom du client">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">Faire une recherche</button>
                </div>
            </form>
            <div class="row">
                <div class="col-lg-12">

                    <!-- Default Table -->
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Client</th>
                            <th scope="col">Chambre</th>
                            <th scope="col">Personnes</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Date début</th>
                            <th scope="col">Date Fin</th>
                            <th scope="col">Jours</th>
                            <th scope="col">Status</th>
                            <th scope="col">Modifier</th>
                            <th scope="col">Voir</th>
                            <th scope="col">Supprimer</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if ($resevations->isEmpty())
                            <td colspan="11">Pas de données trouver</td>
                        @else
                            @foreach ($resevations as $resevation)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $resevation->client_nom }} {{ $resevation->client_prenom }}</td>
                                <td>{{ $resevation->chambre_numero }}</td>
                                <td>{{ $resevation->nombrePersonne }} Personne</td>
                                <td>{{ $resevation->prixTotal }} FCFA</td>
                                <td>{{ $resevation->startedDate }}</td>
                                <td>{{ $resevation->endedDate }}</td>
                                <td>{{ $resevation->nombreJour }} Jours</td>
                                <td>{{ $resevation->status }}</td>
                                <td><a href="{{ route('reservation.edit', $resevation->id) }}"><img src="./assets/img/stylo.png" alt=""></a></td>
                                <td><a href="{{ route('reservation.view', $resevation->id) }}"><img src="./assets/img/voir.png" alt=""></a></td>
                                <td>
                                    <a class="delete-consignateur" data-bs-toggle="modal" data-bs-target="#disablebackdrop{{ $resevation->id }}" href="#">
                                        <img src="{{ asset('./assets/img/supprimer.png') }}" alt="">
                                    </a>
                                </td>
                            </tr>
                    
                            <!-- Modal pour le consignateur en cours -->
                            <div class="modal fade" id="disablebackdrop{{ $resevation->id }}" tabindex="-1" data-bs-backdrop="false">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Confirmation</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Etes-vous sûr de vouloir supprimer la resevation de <b>{{ $resevation->client_nom }} {{ $resevation->client_prenom }} </b> pour la chambre numéro <b>{{ $resevation->chambre_numero }}</b> ?
                                        </div>
                                        <div class="modal-footer">
                                            <a href="#" class="btn btn-primary" data-bs-dismiss="modal">Retour</a>
                                            <form action="{{ route('reservation.destroy', ['id' => $resevation->id]) }}" method="post">
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

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
