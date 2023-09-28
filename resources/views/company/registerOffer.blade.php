<x-guest-layout>
    <img src="{{ asset('images/anadir.png') }}" style="width: 20%; margin:auto" alt="">
    {{--    este select es para desplegar que formulario usaremos--}}
    {{--    ya que para hacer el registro de una oferta--}}
    {{--    existen dos opciones--}}
    {{--    puede registrar los datos de la oferta, o solo puede agregar su imagen de la oferta--}}
    <label for="">Escoja la opcion de regitro</label>
    <select name="optionForm" id="selectForm">
        <option value="0">Rellenar</option>
        <option value="1">Imagen</option>
    </select>
    {{--    este formulario envia varios datos al servidor--}}
    <div id="formRellenar">
        <form method="POST" action="/registerOffer">
            {{-- agrega campo oculto para poder manejar un token y evitar problemas de seguridad--}}
            @csrf
            <!-- Name Offer-->
            <div class="mt-4">
                <x-input-label for="offerName" :value="__('Offer Name')"/>
                <x-text-input id="offerName" class="block mt-1 w-full" type="text" name="offerName"
                              :value="old('offerName')" required autofocus autocomplete="offerName"/>
                <x-input-error :messages="$errors->get('offerName')" class="mt-2"/>
            </div>

            <!-- description-->
            <div class="mt-4">
                <x-input-label for="descriptionOffer" :value="__('Description')"/>
                {{--            <x-text-input id="descriptionOffer" class="block mt-1 w-full" type="text" name="descriptionOffer"--}}
                {{--                          :value="old('descriptionOffer')" required autofocus autocomplete="descriptionOffer"/>--}}
                <textarea id="inputDescriptionEs" class="form-control" name="description_es"
                          rows="7" required></textarea>
                <x-input-error :messages="$errors->get('descriptionOffer')" class="mt-2"/>
            </div>

            <!--Salary-->
            <div class="mt-4">
                <x-input-label for="salary" :value="__('Salary')"/>
                <x-text-input id="salary" class="block mt-1 w-full" type="text" name="salary" :value="old('salary')"
                              required autofocus autocomplete="salary"/>
                <x-input-error :messages="$errors->get('salary')" class="mt-2"/>
            </div>
            {{--            Este campo esta oculto ya que nos ayudara a saver en el servidor que formulario se envia--}}
            <input type="hidden" name="optionForm" value="0">
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4 bg-sky-600">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>
    {{--    Este formulario solo envia una imagen al servidor--}}
    <div id="formImg">
        <form method="POST" action="/registerOffer">
            {{-- agrega campo oculto para poder manejar un token y evitar problemas de seguridad--}}
            @csrf
            <labe>Elija su imagen</labe>
            <input type="file" name="img" id="" required>
            {{--Este campo esta oculto ya que nos ayudara a saver en el servidor que formulario se envia--}}
            <input type="hidden" name="optionForm" value="1">
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4 bg-sky-600">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
{{--llamamos a nuestro archivo js para poder validad el input de el select--}}
@vite(['resources/js/appRegisterOffer.js'])
