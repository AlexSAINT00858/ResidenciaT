<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mis Ofertas') }}
        </h2>
    </x-slot>
    @if (session('danger'))
        <div class="alert alert-danger">
            {{ session('danger') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-4">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100 sectionCards">
                <div class="row row-cols-1 row-cols-md-3 g-4 mx-auto container-fluid containerCards">
                    @foreach($offerts as $offer)
                        @if($offer->offerName)
                            <div class="col">
                                <div class="card h-100">
                                    <img src="{{ asset('images/trabajos.png') }}" class="card-img-top" alt="...">
                                    <div class="card-body text-center">
                                        <h5 class="card-title fw-bold fs-5">{{ $offer->offerName }}</h5>
                                        <hr class="border border-danger border-1 opacity-75">
                                        <p class="card-text">{{ $offer->descriptionOffer }}</p>
                                        <br>
                                        <p class="card-text">${{ $offer->salary }}</p>
                                        <p class="card-text">{{ $offer->email }}</p>
                                        <p class="card-text">{{ $offer->fecha_convertida }}</p>
                                        <a href="/editOffer/{{ $offer->fecha_convertida }}"
                                           class="btn btn-outline-primary btn-sm">Editar</a>
                                        <a href="/changeStateOfferWithData/{{ $offer->fecha_convertida }}"
                                           class="btn btn-outline-secondary btn-sm deleteCard">Eliminar</a>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="col" style="width: 50%; text-align: center">
                                <div class="card h-auto">
                                    <div class="image-container">
                                        <img src="{{ asset('images/OFERTA.png') }}" class="card-img imagen-ampliada"
                                             alt="Imagen" id="">
                                        <a href="/changeStateOfferWithOutData/{{ $offer->fecha_convertida }}"
                                           class="btn btn-outline-secondary btn-sm deleteCard my-3">Eliminar</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
