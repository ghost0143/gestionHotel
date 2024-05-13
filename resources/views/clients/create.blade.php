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
          <li class="breadcrumb-item active">Nouveau client</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->



     
    
        <section class="section">
          <div class="row">
            <div class="col-lg-12">
    
              <div class="card new-user">
                <div class="card-body">
                  <h5 class="card-title">Ajouter des client</h5>
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
                  <form method="post" action="{{ route('client.create') }}">
                   @csrf

                    <div class="mb-3">
                        <label for="" class="form-label">Nom</label>
                        <input type="text" name="nom" value="{{ old('nom') }}" class="form-control @error('nom') is-invalid @enderror">
                        @error('nom')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Prénom</label>
                        <input type="text" name="prenom" value="{{ old('prenom') }}" class="form-control @error('prenom') is-invalid @enderror">
                        @error('prenom')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Téléphone</label>
                        <input type="tel" name="telephone" value="{{ old('telephone') }}" class="form-control @error('telephone') is-invalid @enderror">
                        @error('telephone')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label for="" class="form-label">Sexe</label>
                      <select class="form-select @error('sexe') is-invalid @enderror" name="sexe" aria-label="Default select example">
                          <option value="" {{ old('sexe') == '' ? 'selected' : '' }}>Choisir un genre</option>
                          <option value="Homme" {{ old('sexe') == 'Homme' ? 'selected' : '' }}>Homme</option>
                          <option value="Femme" {{ old('sexe') == 'Femme' ? 'selected' : '' }}>Femme</option>
                      </select>
                      @error('sexe')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                  </div>
                  
                  <div class="mb-3">
                    <label for="" class="form-label">Nationalité</label>
                    <select id="pays" name="pays" class="form-select @error('pays') is-invalid @enderror" aria-label="Default select example">
                        <option value="" {{ old('pays') == '' ? 'selected' : '' }}>Choisir un pays</option>
                    </select>
                    @error('pays')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Adresse</label>
                        <input type="text" name="adresse" value="{{ old('adresse') }}" class="form-control @error('adresse') is-invalid @enderror">
                        @error('adresse')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label for="" class="form-label">Type de client</label>
                      <select class="form-select @error('type') is-invalid @enderror" name="type" aria-label="Default select example">
                          <option value="" {{ old('type') == '' ? 'selected' : '' }}>Choisir un type</option>
                          <option value="VIP" {{ old('type') == 'VIP' ? 'selected' : '' }}>VIP</option>
                          <option value="Groupe" {{ old('type') == 'Groupe' ? 'selected' : '' }}>Groupe</option>
                          <option value="Affaire" {{ old('type') == 'Affaire' ? 'selected' : '' }}>Affaire</option>
                      </select>
                      @error('type')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                  </div>
                  
                  <div class="mb-3">
                    <label for="" class="form-label">Carte de fidélité</label>
                    <select class="form-select @error('carte') is-invalid @enderror" name="carte" aria-label="Default select example">
                        <option value="" {{ old('carte') == '' ? 'selected' : '' }}>Choisir une option</option>
                        <option value="Oui" {{ old('carte') == 'Oui' ? 'selected' : '' }}>Oui</option>
                        <option value="Non" {{ old('carte') == 'Non' ? 'selected' : '' }}>Non</option>
                    </select>
                    @error('carte')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                    <div class="mb-3">
                      <label for="" class="form-label">Profession</label>
                      <input type="text" name="profession" value="{{ old('profession') }}" class="form-control @error('profession') is-invalid @enderror">
                      @error('profession')
                        <div class="text-danger">{{ $message }}</div>
                      @enderror
                  </div>
                  <div class="row mb-3">
                      <div class="col-sm-8">
                        <button type="submit" class="btn btn-primary">Créer</button>
                        <a href="{{ route('client.index') }}" class="btn btn-success">Retour</a>
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
    <script>
      fetch('https://restcountries.com/v3.1/all')
          .then(response => response.json())
          .then(data => {
              const countries = data.map(country => country.name.common);
              countries.sort();
              const selectElement = document.getElementById('pays');
              countries.forEach(country => {
                  const option = document.createElement('option');
                  option.textContent = country;
                  // Vérifiez si la valeur précédente existe et si elle correspond au pays actuel
                  if ('{{ old('pays') }}' === country) {
                      option.selected = true; // Sélectionne l'option si elle correspond à la valeur précédente
                  }
                  selectElement.appendChild(option);
              });
          })
          .catch(error => console.error('Erreur lors de la récupération des pays :', error));
  </script>
  
@endsection