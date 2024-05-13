@extends('layout')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Client</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">Voir le clients</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section profile">
        @if(session('success'))
            <div class="alert alert-success" role="alert" id="success-message">{{ session('success') }}</div>
        @endif
            @if(session('danger'))
                <div class="alert alert-danger" role="alert" id="success-message">{{ session('danger') }}</div>
            @endif
        <div class="row">
  
  
          <div class="col-xl-12">
  
            <div class="card">
              <div class="card-body pt-3">
                <!-- Bordered Tabs -->
                
                <div class="tab-content pt-2">
  
                  <div class="tab-pane fade show active profile-overview" id="profile-overview" role="tabpanel">
  
                    <h5 class="card-title">Détails le la reservation</h5>
  
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Nom du client</div>
                      <div class="col-lg-9 col-md-8">{{ $reservation->client_nom }} {{ $reservation->client_prenom }}</div>
                    </div>
  
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Numero de la chambre</div>
                      <div class="col-lg-9 col-md-8">{{ $reservation->chambre_numero }}</div>
                    </div>
  
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Date de début</div>
                      <div class="col-lg-9 col-md-8">{{ $reservation->startedDate }}</div>
                    </div>
  
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Date de fin</div>
                      <div class="col-lg-9 col-md-8">{{ $reservation->endedDate }}</div>
                    </div>
  
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Nombre de personnes</div>
                      <div class="col-lg-9 col-md-8">{{ $reservation->nombrePersonne }} Personnes(s)</div>
                    </div>
  
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Prix Total</div>
                      <div class="col-lg-9 col-md-8">{{ $reservation->prixTotal }} FCFA</div>
                    </div>
  
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Nombre de jours</div>
                      <div class="col-lg-9 col-md-8">{{ $reservation->nombreJour }} Jours(s)</div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Etat</div>
                      <div class="col-lg-9 col-md-8">{{ $reservation->status }}</div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Créer par l'utilisateur</div>
                      <div class="col-lg-9 col-md-8">{{ $reservation->user_nom }} {{ $reservation->user_prenom }}</div>
                    </div>

                    
                    <div class="row mt-5">
                        <form class="col-auto @if($reservation->status == 'Confirmer' || $reservation->status == 'Annuler') d-none @endif" method="post" action="{{ route('reservation.confirmer', $reservation->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="col-sm-8">
                                    <button type="submit" class="btn btn-primary">Confirmer</button>
                                </div>
                            </div>
                        </form>
                        <form class="col-auto @if($reservation->status == 'Annuler' || $reservation->status == 'Confirmer') d-none @endif" method="post" action="{{ route('reservation.annuler', $reservation->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div>
                                    <button type="submit" class="btn btn-danger">Annuler</button>
                                </div>
                            </div>
                        </form>
                        <form class="col-auto @if($reservation->status == 'En attente') d-none @endif" method="post" action="{{ route('reservation.restaurer', $reservation->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div>
                                    <button type="submit" class="btn btn-dark">Mettre en attente</button>
                                </div>
                            </div>
                        </form>
                        <div class="col-auto mb-3">
                            <div class="col-sm-8">
                              <a href="{{ route('reservation.index') }}" class="btn btn-success">Retour</a>
                            </div>
                        </div>
                    </div>
  
                  </div>
  
                 
  
                </div><!-- End Bordered Tabs -->
  
              </div>
            </div>
  
          </div>
        </div>
      </section>
  </main><!-- End #main -->
@endsection