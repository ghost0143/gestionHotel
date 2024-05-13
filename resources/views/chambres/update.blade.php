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
                  <h5 class="card-title">Modifier des chambres</h5>
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
                  <form method="post" action="{{ route('chambre.update', $chambre->id) }}">
                  @csrf
                  @method('put')

                    <div class="mb-3">
                        <label for="" class="form-label">Numéros de chambre</label>
                        <input type="text" name="numero" value="{{ $chambre->numero }}" class="form-control @error('numero') is-invalid @enderror">
                        @error('numero')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label for="" class="form-label">Type</label>
                      <select class="form-select @error('type') is-invalid @enderror" name="type" aria-label="Default select example">
                          <option value="{{ $chambre->type }}" selected>{{ $chambre->type }}</option>
                          <option value="Single">Single</option>
                          <option value="Double">Double</option>
                          <option value="Triple">Triple</option>
                          <option value="Suite">Suite</option>
                          <option value="Autre">Autre</option>
                      </select>
                      @error('type')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                  </div>
                  
                  <div class="mb-3">
                    <label for="" class="form-label">Système</label>
                    <select class="form-select @error('systeme') is-invalid @enderror" name="systeme" aria-label="Default select example">
                        <option value="{{ $chambre->systeme }}" selected>{{ $chambre->systeme }}</option>
                        <option value="Ventilation">Ventilation</option>
                        <option value="Climatisation">Climatisation</option>
                        <option value="Autres">Autres</option>
                    </select>
                    @error('systeme')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                  <label for="" class="form-label">Vue</label>
                  <select class="form-select @error('vu') is-invalid @enderror" name="vu" aria-label="Default select example">
                      <option value="{{ $chambre->vu }}" selected>{{ $chambre->vu }}</option>
                      <option value="Sur la mer">Sur la mer</option>
                      <option value="Horizon">Horizon</option>
                      <option value="Desert">Desert</option>
                  </select>
                  @error('vu')
                      <div class="text-danger">{{ $message }}</div>
                  @enderror
              </div>
              
                    <div class="mb-3">
                        <label for="" class="form-label">Tarif</label>
                        <input name="tarif" value="{{ $chambre->tarif }}" class="form-control @error('tarif') is-invalid @enderror" type="number">
                        @error('tarif')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label for="" class="form-label">Statut</label>
                      <select class="form-select @error('status') is-invalid @enderror" name="status" aria-label="Default select example">
                          <option value="{{ $chambre->status }}" selected>{{ $chambre->status }}</option>
                          <option value="Libre">Libre</option>
                          <option value="Occupé">Occupé</option>
                      </select>
                      @error('status')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                  </div>
                  

                    
                    
    
                    <div class="row mb-3">
                      <div class="col-sm-8">
                        <button type="submit" class="btn btn-primary">Modifier</button>
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