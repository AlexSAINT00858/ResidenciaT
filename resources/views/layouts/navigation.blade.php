@extends('templetes.templete')
@section('header')
    <img class="text-uppercase text-primary mb-1 logo" src="{{ asset('images/TECNM.png') }}" alt="Image">
    <h1 class="display-3 text-uppercase text-center mb-4">
        Bienvenido a <span class="text-primary">Emplea-T</span>
    </h1>
    <img class="text-uppercase text-primary mb-1 logo" src="{{ asset('images/ITT.png') }}" alt="Image">
@endsection

@section('menu')
    <li class="nav-item">
        <a class="nav-link active btn-outline-light" aria-current="page" href="/dashboard">Inicio</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="/registerOffer">Registrar Oferta</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="/showHistory">Historial</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-bg-light rounded p-2" role="button" data-bs-toggle="dropdown"
           aria-expanded="false"
           aria-current="page" href="">Empresas</a>
        <ul class="dropdown-menu">
            <li>
                <a class="dropdown-item" href="/registerCompany">Registrar empresa</a>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li>
                <a class="dropdown-item" href="/viewCompanies">Ver empresas</a>
            </li>

        </ul>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-bg-light rounded p-2" role="button" data-bs-toggle="dropdown"
           aria-expanded="false"
           aria-current="page" href="">
            {{ Auth::user()->name }}
        </a>
        <ul class="dropdown-menu">
            <li>
                <x-dropdown-link :href="route('profile.edit')" class="dropdown-item">
                    {{ __('Profile') }}
                </x-dropdown-link>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')" class="dropdown-item"
                                     onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </li>
        </ul>
    </li>
@endsection
