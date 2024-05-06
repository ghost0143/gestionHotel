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
        <div class="row">
  
  
          <div class="col-xl-12">
  
            <div class="card">
              <div class="card-body pt-3">
                <!-- Bordered Tabs -->
                
                <div class="tab-content pt-2">
  
                  <div class="tab-pane fade show active profile-overview" id="profile-overview" role="tabpanel">
  
                    <h5 class="card-title">Détails du client</h5>
  
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Nom</div>
                      <div class="col-lg-9 col-md-8">{{ $client->nom }}</div>
                    </div>
  
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Prénom</div>
                      <div class="col-lg-9 col-md-8">{{ $client->prenom }}</div>
                    </div>
  
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Sexe</div>
                      <div class="col-lg-9 col-md-8">{{ $client->sexe }}</div>
                    </div>
  
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Type</div>
                      <div class="col-lg-9 col-md-8">{{ $client->type }}</div>
                    </div>
  
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Adresse</div>
                      <div class="col-lg-9 col-md-8">{{ $client->adresse }}</div>
                    </div>
  
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Téléphone</div>
                      <div class="col-lg-9 col-md-8">{{ $client->telephone }}</div>
                    </div>
  
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Email</div>
                      <div class="col-lg-9 col-md-8">{{ $client->email }}</div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Nationalité</div>
                      <div class="col-lg-9 col-md-8">{{ $client->pays }}</div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Carte</div>
                      <div class="col-lg-9 col-md-8">{{ $client->carte }}</div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Profession</div>
                      <div class="col-lg-9 col-md-8">{{ $client->profession }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-8">
                          <a href="{{ route('client.index') }}" class="btn btn-success">Retour</a>
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