<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Historial') }}
        </h2>
    </x-slot>
</x-app-layout>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="row row-cols-1 row-cols-md-4 g-4 mx-auto container-fluid containerCards">
{{--                    @foreach ($offerts as $offer)--}}
{{--                        <div class="col">--}}
{{--                            <div class="card h-100">--}}
{{--                                --}}{{-- para la imagen seria asi--}}
{{--                                    {{ Auth::user()->logo }}--}}
{{--                                    --}}
{{--                                <img src="{{ asset('images/empresa.png') }}" class="card-img-top" alt="...">--}}
{{--                                <div class="card-body text-center">--}}
{{--                                    <h5 class="card-title fw-bold fs-5">{{ $offer->offerName }}</h5>--}}
{{--                                    <hr class="border border-danger border-1 opacity-75">--}}
{{--                                    <p class="card-text">{{ $offer->descriptionOffer }}</p>--}}
{{--                                    <br>--}}
{{--                                    <p class="card-text">${{ $offer->salary }}</p>--}}
{{--                                    <p class="card-text">{{ $offer->publicationDate }}</p>--}}
{{--                                    <p class="card-text">Fecha eliminacion</p>--}}
{{--                                    <br>--}}
{{--                                    <a href="/deleteOffer/{{ $offer->idOffer }}"--}}
{{--                                       class="btn btn-outline-secondary btn-sm deleteCard">Eliminar</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
                </div>
            </div>
        </div>
    </div>
</div>
