@extends('layout.app')

@section('title', 'Dashboard')

@section('content')
    <main>
        <div class="container-fluid">
        <!-- Judul mainbar -->
        <h5 class="mt-4">Dashboard</h5>
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{session()->get('success')}}
            </div>
        @endif
        <!-- navcard-->
        <div class="row mt-4">
            <!-- card inventaris -->

            <div class="col-xl-3 col-md-6">
            <div class="card mb-3">
                <div class="dropdown">
                <div class="row no-gutters">
                    <div class="col-md-4 bg-primary rounded text-center">
                    <i class="fas fa-boxes mt-3 mb-3" style="font-size: 40px; color: white"></i>
                    </div>
                    <div class="col-md-8">
                    <div class="card-body text-center">
                        <a class="text-dark text-decoration-none" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <h5 class="card-title">Inventaris</h5>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="/alat">Alat</a>
                        <a class="dropdown-item" href="/bahan">Bahan</a>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <!-- end card inventaris -->

            <!-- card menu -->
            <div class="col-xl-3 col-md-6">
            <div class="card mb-3">
                <div class="row no-gutters">
                <div class="col-md-4 bg-danger rounded text-center">
                    <i class="fas fa-cocktail mt-3 mb-3" style="font-size: 40px; color: white"></i>
                </div>
                <div class="col-md-8">
                    <div class="card-body text-center">
                    <a class="text-dark text-decoration-none" href="/menu">
                        <h5 class="card-title">Menu</h5>
                    </a>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <!-- end card menu -->

            <!-- card penjualan -->
            <div class="col-xl-3 col-md-6">
            <div class="card mb-3">
                <div class="row no-gutters">
                <div class="col-md-4 bg-success rounded text-center">
                    <i class="fas fa-calculator mt-3 mb-3" style="font-size: 40px; color: white"></i>
                </div>
                <div class="col-md-8">
                    <div class="card-body text-center">
                    <a class="text-dark text-decoration-none" href="/penjualan">
                        <h5 class="card-title">Penjualan</h5>
                    </a>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <!-- end card penjualan -->
            @if (auth()->user()->level == "owner")
                <!-- card barista -->
                <div class="col-xl-3 col-md-6">
                <div class="card mb-3">
                    <div class="row no-gutters">
                    <div class="col-md-4 bg-warning rounded text-center">
                        <i class="fas fa-user mt-3 mb-3" style="font-size: 40px; color: white"></i>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body text-center">
                        <a class="text-dark text-decoration-none" href="/barista">
                            <h5 class="card-title">Barista</h5>
                        </a>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <!-- end card barista -->
            @endif
        </div>
        <!-- end navcard -->

        <!-- konten -->
        <div class="card mb-3" style="max-width: 100%; height: 65%">
            <div class="row g-0">
            <!-- grafik -->
            <div class="col-md-8">
                <h5 class="mt-2 ml-2">Coffe Shop Management System</h5>
                <div style="width: 100%; height: 400px">
                <canvas id="myChart"></canvas>
                </div>
            </div>
            <!-- end grafik -->
            <!-- menu signature -->
            <div class="col-md-4">
                <div class="card-body mt-1 mb-3">
                <h5 class="card-title">Menu Signature :</h5>
                <h6>Kopi Susu</h6>
                <div class="bar bg-primary mb-3" style="width: 150px"></div>
                <h6>Red Velvet</h6>
                <div class="bar bg-danger mb-3" style="width: 170px"></div>
                <h6>Matcha</h6>
                <div class="bar bg-success mb-3" style="width: 100px"></div>
                <h6>Americano</h6>
                <div class="bar bg-warning mb-3" style="width: 40px"></div>
                </div>
            </div>
            <!-- end menu signature -->
            </div>
        </div>
        <!-- end konten-->
        </div>
    </main>

@endsection