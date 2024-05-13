@extends('layout')

@section('content')

    <main id="main" class="main">
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
            <div class="row">
                <div class="col-lg-12">

                    <div class="card new-user">
                        <div class="card-body">
                            <h5 class="card-title">Modifier une Reservation</h5>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- General Form Elements -->
                            <form method="post" action="{{ route('reservation.update', $reservation->id) }}">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label class="form-label" for="client">Nom du client</label>
                                    <input type="text" class="form-control" id="searchClient" placeholder="Rechercher un client...">
                                    <select style="margin-top: 10px;" name="client_id" class="form-select @error('client_id') is-invalid @enderror" id="client">
                                        <option value="{{ $reservation->client_id }}">{{ $reservation->client_nom }} {{ $reservation->client_prenom }}</option>
                                        @foreach($clients as $client)
                                            <option value="{{ $client->id }}">{{ $client->nom }} {{ $client->prenom }}</option>
                                        @endforeach
                                    </select>
                                    @error('client_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <p id="noResults" class="text-danger" style="display: none;">Ce client n'existe pas! <a href="{{ route('client.createForm') }}">Créez le ici</a></p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="client">Numéro de chambre</label>
                                    <input type="text" class="form-control" id="searchChambre" placeholder="Rechercher une chambre...">
                                    <select style="margin-top: 10px;" name="chambre_id" class="form-select @error('chambre_id') is-invalid @enderror" id="chambre">
                                        <option value="{{ $reservation->chambre_id }}">{{ $reservation->chambre_numero }}</option>
                                        @foreach($chambres as $chambre)
                                            <option value="{{ $chambre->id }}">{{ $chambre->numero }}</option>
                                        @endforeach
                                    </select>
                                    @error('chambre_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <p id="noResult" class="text-danger" style="display: none;">Cette chambre n'existe pas! <a href="{{ route('chambre.formCreate') }}">Créez la ici</a></p>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Nombre de personne</label>
                                    <input name="nombrePersonne" type="number" value="{{ $reservation->nombrePersonne }}" class="form-control @error('nombrePersonne') is-invalid @enderror">
                                    @error('nombrePersonne')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Date début</label>
                                    <input name="startedDate" type="date" value="{{ $reservation->startedDate }}" class="form-control @error('startedDate') is-invalid @enderror">
                                    @error('startedDate')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Date Fin</label>
                                    <input name="endedDate" type="date" value="{{ $reservation->endedDate }}" class="form-control @error('endedDate') is-invalid @enderror">
                                    @error('endedDate')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-8">
                                        <button type="submit" class="btn btn-primary">Réserver</button>
                                        <a href="{{ route('reservation.index') }}" class="btn btn-success">Retour</a>
                                    </div>
                                </div>

                            </form><!-- End General Form Elements -->

                        </div>
                    </div>

                </div>

                <div class="col-lg-9">



                </div>
            </div>
        </section>

    </main><!-- End #main -->
    
    

@endsection









