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

                            <!-- General Form Elements -->
                            <form method="post" action="{{ route('utilisateur.update', $user->id) }}">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="" class="form-label">Nom</label>
                                    <input name="nom" value="{{ $user->nom }}" type="text" class="form-control">
                                    @error('nom')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Prénom</label>
                                    <input name="prenom" value="{{ $user->prenom }}" type="text" class="form-control">
                                    @error('prenom')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Username</label>
                                    <input name="username" value="{{ $user->username }}" type="text" class="form-control">
                                    @error('username')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Email</label>
                                    <input name="email" value="{{ $user->email }}" type="email" class="form-control">
                                    @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label for="" class="form-label">Rôle</label>
                                    <select name="role" class="form-select" aria-label="Default select example">
                                        <option selected>Choisir un rôle</option>
                                        <option value="admin">Administrateur</option>
                                        <option value="employe">Employe</option>
                                    </select>
                                    @error('role')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>




                                <div class="row mb-3">
                                    <div class="col-sm-8">
                                        <button type="submit" class="btn btn-primary">Modifier</button>
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
