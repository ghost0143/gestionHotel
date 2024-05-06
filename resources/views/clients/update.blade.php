@extends('layout')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Client</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">Modification</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->



     
    
        <section class="section">
          <div class="row">
            <div class="col-lg-12">
    
              <div class="card new-user">
                <div class="card-body">
                  <h5 class="card-title">Modifier des client</h5>
    
                  <!-- General Form Elements -->
                  <form method="post" action="{{ route('client.update', $client->id) }}">
                  @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="" class="form-label">Nom</label>
                        <input type="text" name="nom" value="{{ $client->nom }}" class="form-control">
                        @error('nom')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Prénom</label>
                        <input type="text" value="{{ $client->prenom }}" name="prenom" class="form-control">
                        @error('prenom')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" value="{{ $client->email }}" name="email" class="form-control">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Téléphone</label>
                        <input type="tel" value="{{ $client->telephone }}" name="telephone" class="form-control">
                        @error('telephone')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for=""  class="form-label">Sexe</label>
                        <select class="form-select" name="sexe" aria-label="Default select example">
                            <option>{{ $client->sexe }}</option>
                            <option>Homme</option>
                            <option>Femme</option>
                          </select>
                          @error('sexe')
                            <div class="text-danger">{{ $message }}</div>
                          @enderror
                    </div>
                    <div class="mb-3">
                        <label for=""  class="form-label">Nationlité</label>
                        <select id="pays" name="pays" class="form-select" aria-label="Default select example">
                            <option>{{ $client->pays }}</option>
                          </select>
                          @error('pays')
                            <div class="text-danger">{{ $message }}</div>
                          @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Adresse</label>
                        <input type="text" value="{{ $client->adresse }}" name="adresse" class="form-control">
                        @error('adresse')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for=""  class="form-label">Type de client</label>
                        <select  class="form-select" name="type" aria-label="Default select example">
                            <option>{{ $client->type }}</option>
                            <option>VIP</option>
                            <option>Groupe</option>
                            <option>Affaire</option>
                          </select>
                          @error('type')
                            <div class="text-danger">{{ $message }}</div>
                          @enderror
                    </div>
                    <div class="mb-3">
                        <label for=""  class="form-label">Carte de fidelité</label>
                        <select  class="form-select" name="carte" aria-label="Default select example">
                            <option>{{ $client->telephone }}</option>
                            <option>Oui</option>
                            <option>Non</option>
                          </select>
                          @error('carte')
                            <div class="text-danger">{{ $message }}</div>
                          @enderror
                    </div>
                    <div class="mb-3">
                      <label for="" class="form-label">Profession</label>
                      <input type="text" value="{{ $client->profession }}" name="profession" class="form-control">
                      @error('profession')
                        <div class="text-danger">{{ $message }}</div>
                      @enderror
                  </div>
                  <div class="row mb-3">
                      <div class="col-sm-8">
                        <button type="submit" class="btn btn-primary">Modifier</button>
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
                    selectElement.appendChild(option);
                });
            })
            .catch(error => console.error('Erreur lors de la récupération des pays :', error));
    </script>
  
@endsection