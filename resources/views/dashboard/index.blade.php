@extends('layout')

@section('content')

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">
                        <!-- Sales Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div id="conteneur" class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Chambre</h5>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-cart"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>145</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Sales Card -->
                        <!-- Revenue Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div id="sortie" class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Reservation</h5>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-cart"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>145</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Revenue Card -->
                        <!-- Customers Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div id="entre" class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Clients</h5>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-cart"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>145</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Customers Card -->

                    </div>
                </div><!-- End Left side columns -->
                <!-- Right side columns -->
            </div>
        </section>
    </main><!-- End #main -->

@endsection
