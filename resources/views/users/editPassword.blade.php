@extends('layout')
@section('content')

    <div class="pagetitle">
        @if(session('danger'))
        <div id="success-message" class="alert alert-danger" role="alert">
          {{ session('danger') }}
        </div>
    @endif
        <h1>Utilisateur</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Modifier mon mot de passe</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card new-consignateur-form">
                <div class="card-body">
                      <h5 class="card-title">Modifier</h5>

                      <!-- General Form Elements -->
                      <form action="{{ route('utilisateur.updatePassword', Auth::user()->id) }}" method="post">
                        @method('put')
                      @csrf

                        <div class="mb-3">
                            <label for="" class="form-label">Ancien mot de passe</label>
                            <input type="password" name="oldPassword" class="form-control">
                            @error('oldPassword')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Nouveau mot de passe</label>
                            <input type="password" name="password" class="form-control">
                            @error('password')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Confirmer mot de passe</label>
                            <input type="password" name="confirmPassword" class="form-control">
                            @error('confirmPassword')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                       



                        <div class="row mb-3">
                          <div class="col-sm-8">
                            <button type="submit" value="Update" class="btn btn-primary">Modifier</button>

                            <a class="btn btn-success" href="">Annuler</a>
                          </div>
                        </div>

                      </form><!-- End General Form Elements -->

                </div>
            </div>
        </div>
    </div>


@endsection
