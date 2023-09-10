<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>EMPLEA-T</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    </head>
<body>
    @extends('templetes.templete')
    @section('header')
        <img class="text-uppercase text-primary mb-1 logo" src="{{ asset('images/TECNM.png') }}" alt="Image">
        <h1 class="display-3 text-uppercase text-center mb-4">
            Bienvenido a <span class="text-primary">Emplea-T</span>
        </h1>
        <img class="text-uppercase text-primary mb-1 logo" src="{{ asset('images/ITT.png') }}" alt="Image">
    @endsection
    @section('menu')    
        <li><a href="/">Inicio</a></li>
        <li><a href="/login">Iniciar Sesion como Empresa</a></li>
        <li><a href="/register">Registrar Empresa</a></li>
    @endsection
    
    @section('contenido')
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('danger'))
            <div class="alert alert-danger">
                {{ session('danger') }}
            </div>
        @endif
        <!-- Carousel -->
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="{{ asset('images/ing-administracion.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="{{ asset('images/ing-biomedica.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/ing-civil.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/ing-electromecanica.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/ing-mecatronica.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/ing-sc.jpg') }}" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="py-12">
            <br>
            <br>
            <br>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="row row-cols-1 row-cols-md-4 g-4 mx-auto container-fluid containerCards">
                            @foreach ($offerts as $offer)
                                <div class="col" >
                                    <div class="card h-100">
                                        <img src="{{ asset('images/trabajos.png') }}" class="card-img-top" alt="...">
                                        <div class="card-body text-center">
                                            <h5 class="card-title fw-bold fs-5">{{ $offer->offerName }}</h5>
                                            <hr class="border border-danger border-1 opacity-75">
                                            <p class="card-text">{{ $offer->descriptionOffer }}</p>
                                            <br>
                                            <p class="card-text">${{ $offer->salary }}</p>
                                            <p class="card-text">{{ $offer->publicationDate }}</p>
                                            
                                            <a href="/loginCandidate/{{ $offer->idOffer }}" class="btn btn-outline-primary btn-sm">Postularse</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    @endsection
    

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>