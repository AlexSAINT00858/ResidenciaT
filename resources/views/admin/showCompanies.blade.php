<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Compañias') }}
        </h2>
    </x-slot>
</x-app-layout>
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
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-4">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100 sectionCards">
                <div class="row row-cols-1 row-cols-md-3 g-4 mx-auto container-fluid containerCards">
                    @foreach($companies as $company)
                        <div class="col">
                            <div class="card h-100">
                                <img src="{{ asset('images/empresa.png') }}" class="card-img-top" alt="...">
                                <div class="card-body text-center">
                                    <h5 class="card-title fw-bold fs-5">{{ $company->nameCompany }}</h5>
                                    <hr class="border border-danger border-1 opacity-75">
                                    <p class="card-text">{{ $company->address }}</p>
                                    <br>
                                    <p class="card-text">{{ $company->phoneNumber }}</p>
                                    <p class="card-text">{{ $company->email }}</p>
                                    <a href="/editCompany/{{ $company->email }}"
                                       class="btn btn-outline-primary btn-sm">Editar</a>
                                    <a href="/deleteCompany/{{ $company->email }}"
                                       class="btn btn-outline-secondary btn-sm deleteCard">Eliminar</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
