@extends('layout')

@section('content')
    <main id="main" class="main">
        @if(session('success'))
            <div class="alert alert-success" role="alert" id="success-message">{{ session('success') }}</div>
        @endif
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
            <div class="row mb-3">
                <div class="col-sm-8">
                    <a href="{{ route('utilisateur.formCreate') }}" class="btn btn-success">Nouvel Utilisateur</a>
                </div>
            </div>
            <form class="row g-3 py-3">
                <div class="col-auto">
                    <input type="text" class="form-control" id="inputPassword2" placeholder="Nom de utilisateur">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">Faire une recherche</button>
                </div>
            </form>
            <div class="row">
                <div class="col-lg-12">

                    <!-- Default Table -->
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prenoms</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Rôle</th>
                            <th scope="col">Modifier</th>
                            <th scope="col">Supprimer</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{ $user->nom }}</td>
                            <td>{{ $user->prenom }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td><a href="{{ route('utilisateur.edit', $user->id) }}"><img src="./assets/img/stylo.png" alt=""></a></td>
                            <td><a href="#"><img src="./assets/img/supprimer.png" alt=""></a></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- End Default Table Example -->

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
