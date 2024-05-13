@extends('layout')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Chambre</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">Chambre</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->



     
    
        <section class="section">
          <div class="row">
            <div class="col-lg-12">
    
              <div class="card new-user">
                <div class="card-body">
                  <h5 class="card-title">Ajouter des chambres</h5>
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
                  <form method="post" action="{{ route('chambre.create') }}">
                  @csrf

                    <div class="mb-3">
                        <label for="" class="form-label">Numéros de chambre</label>
                        <input type="text" value="{{ old('numero') }}" name="numero" class="form-control @error('numero') is-invalid @enderror"">
                        @error('numero')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label for="" class="form-label">Type</label>
                      <select class="form-select" name="type" aria-label="Default select example">
                          <option value="" {{ old('type') == '' ? 'selected' : '' }}>Choisir un type</option>
                          <option value="Single" {{ old('type') == 'Single' ? 'selected' : '' }}>Single</option>
                          <option value="Double" {{ old('type') == 'Double' ? 'selected' : '' }}>Double</option>
                          <option value="Triple" {{ old('type') == 'Triple' ? 'selected' : '' }}>Triple</option>
                          <option value="Suite" {{ old('type') == 'Suite' ? 'selected' : '' }}>Suite</option>
                          <option value="Autre" {{ old('type') == 'Autre' ? 'selected' : '' }}>Autre</option>
                      </select>
                      @error('type')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                  </div>
                  
                  <div class="mb-3">
                    <label for="" class="form-label">Système</label>
                    <select class="form-select" name="systeme" aria-label="Default select example">
                        <option value="" {{ old('systeme') == '' ? 'selected' : '' }}>Choisir un système</option>
                        <option value="Ventilation" {{ old('systeme') == 'Ventilation' ? 'selected' : '' }}>Ventilation</option>
                        <option value="Climatisation" {{ old('systeme') == 'Climatisation' ? 'selected' : '' }}>Climatisation</option>
                        <option value="Autres" {{ old('systeme') == 'Autres' ? 'selected' : '' }}>Autres</option>
                    </select>
                    @error('systeme')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                  <label for="" class="form-label">Vue</label>
                  <select class="form-select" name="vu" aria-label="Default select example">
                      <option value="" {{ old('vu') == '' ? 'selected' : '' }}>Choisir une vue</option>
                      <option value="Sur la mer" {{ old('vu') == 'Sur la mer' ? 'selected' : '' }}>Sur la mer</option>
                      <option value="Horizon" {{ old('vu') == 'Horizon' ? 'selected' : '' }}>Horizon</option>
                      <option value="Desert" {{ old('vu') == 'Desert' ? 'selected' : '' }}>Desert</option>
                  </select>
                  @error('vu')
                      <div class="text-danger">{{ $message }}</div>
                  @enderror
              </div>
              
                    <div class="mb-3">
                        <label for="" class="form-label">Tarif</label>
                        <input name="tarif" value="{{ old('tarif') }}" class="form-control @error('tarif') is-invalid @enderror" type="number">
                        @error('tarif')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    

                    
                    
    
                    <div class="row mb-3">
                      <div class="col-sm-8">
                        <button type="submit" class="btn btn-primary">Créer</button>
                        <a href="{{ route('chambre.index') }}" class="btn btn-success">Retour</a>
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