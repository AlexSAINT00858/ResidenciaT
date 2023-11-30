<div class="w-50 rounded-4 border border-4 m-auto align-self-center my-5">
    <x-guest-layout>
        <div class="row w-100 m-auto">
            <img src="{{ asset('images/editar.jpg') }}" style="width:20%;" class="col-md-4 m-auto" alt="">
        </div>
        {{--
            Pasamos como atributo el id de la oferta la cual se ha modificado
            $offerSelected nos la proporciona el controlador el cual es un objeto que contiene los datos de la oferta a editar
        --}}
        <form method="POST" action="{{ route('editOffer',['idOffer' => $offerSelected->first()->fecha_convertida]) }}"
              class="w-100 m-auto align-self-center my-3" style="text-align: center">
            {{--        agrega campo oculto para poder manejar un token y evitar problemas de seguridad--}}
            @csrf
            <!-- Name Offer-->
            <div class="mt-4">
                <x-input-label for="offerName" :value="__('Offer Name')"/>
                <br>
                <x-text-input id="offerName" class="block mt-1 w-75" type="text" name="offerName"
                              :value="old('offerName' , $offerSelected->first()->offerName)" required autofocus
                              autocomplete="offerName"/>
                <x-input-error :messages="$errors->get('offerName')" class="mt-2"/>
            </div>

            <!-- description-->
            <div class="mt-4">
                <x-input-label for="descriptionOffer" :value="__('Description')"/>
                <br>
                <textarea id="descriptionOffer" class="block mt-1 w-75" name="descriptionOffer" rows="7"
                          :value="old('descriptionOffer', $offerSelected->first()->descriptionOffer)" required autofocus
                          autocomplete="descriptionOffer"><?php echo $offerSelected->first()->descriptionOffer; ?></textarea>
                <x-input-error :messages="$errors->get('descriptionOffer')" class="mt-2"/>
            </div>

            <!--Salary-->
            <div class="mt-4">
                <x-input-label for="salary" :value="__('Salary')"/>
                <br>
                <x-text-input id="salary" class="block mt-1 w-75" type="text" name="salary"
                              :value="old('salary', $offerSelected->first()->salary)" required autofocus
                              autocomplete="salary"/>
                <x-input-error :messages="$errors->get('salary')" class="mt-2"/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4 bg-sky-600 btn btn-primary">
                    {{ __('Guardar') }}
                </x-primary-button>
            </div>
        </form>
    </x-guest-layout>
</div>
