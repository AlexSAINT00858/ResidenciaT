<x-guest-layout>
    <center>
        <img src="{{ asset('images/anadir.png') }}" alt="">
    </center>
    
    <form method="POST" action="/loginCandidate/{{ $idOffer }}">
        @if (session('danger'))
            <div class="alert alert-danger">
                {{ session('danger') }}
            </div>
        @endif
        {{-- agrega campo oculto para poder manejar un token y evitar problemas de seguridad--}}
        @csrf

        <!-- Curp-->
        <div class="mt-4">
            <x-input-label for="CURP" :value="__('CURP')" />
            <x-text-input id="CURP" class="block mt-1 w-full" type="text" name="CURP" :value="old('CURP')" required autofocus autocomplete="CURP" />
            <x-input-error :messages="$errors->get('CURP')" class="mt-2" />
        </div>

        <div class="mt-4">
            <a href="/registerCandidate/{{ $idOffer }}" class="link-opacity-10-hover"><u>No me he registrado!!</u></a>
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4 bg-sky-600">
                {{ __('Postularse') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>