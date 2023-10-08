<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Compañias') }}
        </h2>
    </x-slot>
</x-app-layout>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="row row-cols-1 row-cols-md-4 g-4 mx-auto container-fluid containerCards">

                    <div class="col">
                        <div class="card h-100">
                            <img src="{{ asset('images/empresa.png') }}" class="card-img-top" alt="...">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold fs-5">Nombre de la compañia</h5>
                                <hr class="border border-danger border-1 opacity-75">
                                <p class="card-text">Direccion</p>
                                <br>
                                <p class="card-text">Numero telefonico</p>
{{--                                falta agregar el id de la compañia--}}
                                {{ $idCompany = "osapat@gmail.com" }}
                                <a href="/editCompany/{{ $idCompany }}"
                                   class="btn btn-outline-primary btn-sm">Editar</a>
                                <a href=""
                                   class="btn btn-outline-secondary btn-sm deleteCard">Eliminar</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
