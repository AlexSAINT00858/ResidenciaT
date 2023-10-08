<x-guest-layout>
    <img src="{{ asset('images/editar.jpg') }}" style="width: 20%; margin: 10px auto" alt="">
    {{--    este formulario envia varios datos de la compañia al servidor--}}
    <form method="POST" action="/registerCompany">
        {{-- agrega campo oculto para poder manejar un token y evitar problemas de seguridad--}}
        @csrf
        <!-- Nombre de la compañia-->
        <div class="mt-4">
            <x-input-label for="nameCompany" :value="__('Nombre de la compañia')"/>
            <x-text-input id="nameCompany" class="block mt-1 w-full" type="text" name="nameCompany"
                          :value="old('nameCompany')" required autofocus autocomplete="nameCompany"/>
            <x-input-error :messages="$errors->get('nameCompany')" class="mt-2"/>
        </div>

        <!-- direccion-->
        <div class="mt-4">
            <x-input-label for="address" :value="__('Direccion')"/>
            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address"
                          :value="old('address')" required autofocus autocomplete="address"/>
        </div>

        <!--numero de telefono-->
        <div class="mt-4">
            <x-input-label for="phoneNumber" :value="__('Telefono')"/>
            <x-text-input id="phoneNumber" class="block mt-1 w-full" type="text" name="phoneNumber" :value="old('phoneNumber')"
                          required autofocus autocomplete="phoneNumber"/>
            <x-input-error :messages="$errors->get('phoneNumber')" class="mt-2"/>
        </div>
        <!--logo de la empresa-->
        <div class="mt-4">
            <x-input-label for="logo" :value="__('Logo de la empresa (Opcional)')" />
            <input id="logo" class="block mt-1 w-full" type="file" name="logo" :value="old('logo')" autofocus autocomplete="logo" />
            <x-input-error :messages="$errors->get('logo')" class="mt-2" />
        </div>
        {{--            Este campo esta oculto ya que nos ayudara a saver en el servidor que formulario se envia--}}
        <input type="hidden" name="optionForm" value="0">
        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4 bg-sky-600">
                {{ __('Registrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
