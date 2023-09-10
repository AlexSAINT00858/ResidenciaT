<x-guest-layout>
    <center>
        <img src="{{ asset('images/anadir.png') }}" style="width: 20%" alt="">
    </center>
    <form method="POST" action="/registerOffer">
        {{-- agrega campo oculto para poder manejar un token y evitar problemas de seguridad--}}
        @csrf

        <!-- Name Offer-->
        <div class="mt-4">
            <x-input-label for="offerName" :value="__('Offer Name')" />
            <x-text-input id="offerName" class="block mt-1 w-full" type="text" name="offerName" :value="old('offerName')" required autofocus autocomplete="offerName" />
            <x-input-error :messages="$errors->get('offerName')" class="mt-2" />
        </div>

        <!-- description-->
        <div class="mt-4">
            <x-input-label for="descriptionOffer" :value="__('Description')" />
            <x-text-input id="descriptionOffer" class="block mt-1 w-full" type="text" name="descriptionOffer" :value="old('descriptionOffer')" required autofocus autocomplete="descriptionOffer" />
            <x-input-error :messages="$errors->get('descriptionOffer')" class="mt-2" />
        </div>

        <!--Salary-->
        <div class="mt-4">
            <x-input-label for="salary" :value="__('Salary')" />
            <x-text-input id="salary" class="block mt-1 w-full" type="text" name="salary" :value="old('salary')" required autofocus autocomplete="salary" />
            <x-input-error :messages="$errors->get('salary')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4 bg-sky-600">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>