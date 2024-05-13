@extends('layout')

@section('content')

    <main id="main" class="main">
        @if(session('danger'))
            <div class="alert alert-danger" role="alert" id="success-message">{{ session('danger') }}</div>
        @endif
        <div class="pagetitle">
            <h1>Utilisateur</h1>
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
                            <h5 class="card-title">Modifier des utilisateurs</h5>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

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

                <div class="col-lg-9">



                </div>
            </div>
        </section>

    </main><!-- End #main -->

@endsection
