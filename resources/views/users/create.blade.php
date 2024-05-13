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
                    <li class="breadcrumb-item active">Utilisateur</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->





        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card new-user">
                        <div class="card-body">
                            <h5 class="card-title">Ajouter des utilisateurs</h5>
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
                            <form method="post" action="{{ route('utilisateur.create') }}">
                                @csrf

                                <div class="mb-3">
                                    <label for="" class="form-label">Nom</label>
                                    <input name="nom" type="text" value="{{ old('nom') }}" class="form-control @error('nom') is-invalid @enderror">
                                    @error('nom')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Prénom</label>
                                    <input name="prenom" type="text" value="{{ old('prenom') }}" class="form-control @error('prenom') is-invalid @enderror">
                                    @error('prenom')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Username</label>
                                    <input name="username" type="text" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror">
                                    @error('username')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Email</label>
                                    <input name="email" type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
                                    @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Password</label>
                                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror">
                                    @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Confirme password</label>
                                    <input name="password_confirm" type="password" class="form-control @error('password_confirm') is-invalid @enderror">
                                    @error('password_confirm')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Rôle</label>
                                    <select name="role" class="form-select @error('role') is-invalid @enderror" aria-label="Default select example">
                                        <option value="" {{ old('role') == '' ? 'selected' : '' }}>Choisir un rôle</option>
                                        <option value="Administrateur" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrateur</option>
                                        <option value="Employé" {{ old('role') == 'employe' ? 'selected' : '' }}>Employé</option>
                                    </select>
                                    @error('role')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                




                                <div class="row mb-3">
                                    <div class="col-sm-8">
                                        <button type="submit" class="btn btn-primary">Créer</button>
                                        <a href="{{ route('utilisateur.index') }}" class="btn btn-success">Retour</a>
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







<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
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
</section>