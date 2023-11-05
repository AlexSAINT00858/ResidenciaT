<div class="w-50 rounded-4 border border-4 m-auto align-self-center my-5">
    <x-guest-layout>
        <dvi class="row w-100 m-auto">
            <img src="{{ asset('images/anadir.png') }}" style="width:20%;" class="col-md-4 m-auto" alt="">
        </dvi>
        @if (session('danger'))
            <div class="alert alert-danger">
                {{ session('danger') }}
            </div>
        @endif
        {{--    este formulario envia varios datos de la compañia al servidor--}}
        <form method="POST" action="/editCompany/{{ $companySelected->first()->email }}" class="w-100 m-auto my-3"
              style="text-align: center; width: 40%" enctype="multipart/form-data">
            {{-- agrega campo oculto para poder manejar un token y evitar problemas de seguridad--}}
            @csrf
            <!-- Nombre de la compañia-->
            <div class="mt-4">
                <x-input-label for="nameCompany" :value="__('Nombre de la compañia')"/>
                <br>
                <x-text-input id="nameCompany" class="block mt-1 w-75" type="text" name="nameCompany"
                              :value="old('nameCompany')" value="{{ $companySelected->first()->nameCompany }}" required autofocus autocomplete="nameCompany"/>
                <x-input-error :messages="$errors->get('nameCompany')" class="mt-2"/>
            </div>

            {{--email--}}
            <div class="mt-4">
                <x-input-label for="email" :value="__('Correo electronico')"/>
                <br>
                <x-text-input id="email" class="block mt-1 w-75" type="text" name="email"
                              :value="old('email')" value="{{ $companySelected->first()->email }}" required autofocus autocomplete="email"/>
                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
            </div>

            <!-- direccion-->
            <div class="mt-4">
                <x-input-label for="address" :value="__('Direccion')"/>
                <br>
                <x-text-input id="address" class="block mt-1 w-75" type="text" name="address"
                              :value="old('address')" value="{{ $companySelected->first()->address }}" autofocus autocomplete="address"/>
            </div>

            <!--numero de telefono-->
            <div class="mt-4">
                <x-input-label for="phoneNumber" :value="__('Telefono')"/>
                <br>
                <x-text-input id="phoneNumber" class="block mt-1 w-75" type="text" name="phoneNumber"
                              :value="old('phoneNumber')" value="{{ $companySelected->first()->phoneNumber }}" autofocus autocomplete="phoneNumber"/>
                <x-input-error :messages="$errors->get('phoneNumber')" class="mt-2"/>
            </div>
            <!--logo de la empresa-->
            <div class="mt-4">
                <x-input-label for="logo" :value="__('Logo de la empresa (Opcional)')"/>
                <br>
                <input id="logo" class="block mt-1 w-75" type="file" name="logo" :value="old('logo')" autofocus autocomplete="logo"/>
                <x-input-error :messages="$errors->get('logo')" class="mt-2"/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4 bg-sky-600 btn btn-primary">
                    {{ __('Editar') }}
                </x-primary-button>
            </div>
        </form>
    </x-guest-layout>
</div>
