<x-guest-layout>
    <center>
        <img src="{{ asset('images/anadir.png') }}" alt="">
    </center>
    @if (session('danger'))
        <div class="alert alert-danger">
            {{ session('danger') }}
        </div>
    @endif
    <form method="POST" action="/registerCandidate/{{ $idOffer }}" enctype="multipart/form-data">
        {{-- agrega campo oculto para poder manejar un token y evitar problemas de seguridad--}}
        @csrf

        <!-- Curp-->
        <div class="mt-4">
            <x-input-label for="CURP" :value="__('CURP')" />
            <x-text-input id="CURP" class="block mt-1 w-full" type="text" name="CURP" :value="old('CURP')" required autofocus autocomplete="CURP" />
            <x-input-error :messages="$errors->get('CURP')" class="mt-2" />
        </div>

        <!--name candiate-->
        <div class="mt-4">
            <x-input-label for="nameCandidate" :value="__('Name Candidate')" />
            <x-text-input id="nameCandidate" class="block mt-1 w-full" type="text" name="nameCandidate" :value="old('nameCandidate')" required autofocus autocomplete="nameCandidate" />
            <x-input-error :messages="$errors->get('nameCandidate')" class="mt-2" />
        </div>

        <!--last Name-->
        <div class="mt-4">
            <x-input-label for="lastName" :value="__('Last Name')" />
            <x-text-input id="lastName" class="block mt-1 w-full" type="text" name="lastName" :value="old('lastName')" required autofocus autocomplete="lastName" />
            <x-input-error :messages="$errors->get('lastName')" class="mt-2" />
        </div>

        <!--Phone Number-->
        <div class="mt-4">
            <x-input-label for="phoneNumberCandidate" :value="__('Phone Number')" />
            <x-text-input id="phoneNumberCandidate" class="block mt-1 w-full" type="text" name="phoneNumberCandidate" :value="old('phoneNumberCandidate')" required autofocus autocomplete="phoneNumberCandidate" />
            <x-input-error :messages="$errors->get('phoneNumberCandidate')" class="mt-2" />
        </div>

        <!--Email-->
        <div class="mt-4">
            <x-input-label for="emailCandidate" :value="__('Email')" />
            <x-text-input id="emailCandidate" class="block mt-1 w-full" type="text" name="emailCandidate" :value="old('emailCandidate')" required autofocus autocomplete="emailCandidate" />
            <x-input-error :messages="$errors->get('emailCandidate')" class="mt-2" />
        </div>

        <!--Job Trade-->
        <div class="mt-4">
            <x-input-label for="jobTrade" :value="__('Job Trade')" />
            <x-text-input id="jobTrade" class="block mt-1 w-full" type="text" name="jobTrade" :value="old('jobTrade')" required autofocus autocomplete="jobTrade" />
            <x-input-error :messages="$errors->get('jobTrade')" class="mt-2" />
        </div>

        <!--Resume-->
        <div class="mt-4">
            <x-input-label for="resumeCandidate" :value="__('Resume')" />
            <input id="resumeCandidate" class="block mt-1 w-full" type="file" name="resumeCandidate" :value="old('resumeCandidate')" required autofocus autocomplete="resumeCandidate" />
            <x-input-error :messages="$errors->get('resumeCandidate')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4 bg-sky-600">
                {{ __('Postularse') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>