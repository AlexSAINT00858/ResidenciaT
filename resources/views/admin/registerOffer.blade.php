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
        {{--    este select es para desplegar que formulario usaremos--}}
        {{--    ya que para hacer el registro de una oferta--}}
        {{--    existen dos opciones--}}
        {{--    puede registrar los datos de la oferta, o solo puede agregar su imagen de la oferta--}}
        <div class="m-auto" style="text-align: center">
            <label for="" class="mx-2">Escoja la opcion de regitro</label>
            <select name="optionForm" id="selectForm" class="m-3">
                <option value="0">Rellenar</option>
                <option value="1">Imagen</option>
            </select>
        </div>
        {{--    este formulario envia varios datos al servidor--}}
        <div id="formRellenar">
            <form method="POST" action="{{ route('registerOfferWithData') }}" class="w-100 m-auto my-3"
                  style="text-align: center; width: 40%">
                {{-- agrega campo oculto para poder manejar un token y evitar problemas de seguridad--}}
                @csrf
                <!-- Name Offer-->
                <div class="mt-4">
                    <x-input-label for="offerName" :value="__('Nombre de la oferta')"/>
                    <br>
                    <x-text-input id="offerName" class="block mt-1 w-75" type="text" name="offerName"
                                  :value="old('offerName')" required autofocus autocomplete="offerName"/>
                    <x-input-error :messages="$errors->get('offerName')" class="mt-2"/>
                </div>

                <!-- description-->
                <div class="mt-4 m-auto" style="text-align: center">
                    <x-input-label for="descriptionOffer" :value="__('Descripcion de la oferta')"/>
                    <br>
                    <textarea id="inputDescriptionEs" class="block mt-1 w-75" name="descriptionOffer"
                              rows="7" required></textarea>
                    <x-input-error :messages="$errors->get('descriptionOffer')" class="mt-2"/>
                </div>

                <!--Salary-->
                <div class="mt-4">
                    <x-input-label for="salary" :value="__('Salario')"/>
                    <br>
                    <x-text-input id="salary" class="block mt-1 w-75" type="text" name="salary" :value="old('salary')"
                                  autofocus/>
                    <x-input-error :messages="$errors->get('salary')" class="mt-2"/>
                </div>
                <div class="m-auto" style="text-align: center">
                    <label for="" class="mx-2">Elija la empresa</label>
                    <select name="idCompany" id="selectForm" class="m-3">
                        @foreach($companies as $company)
                            <option value="{{ $company->email }}">{{ $company->nameCompany }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ml-4 bg-sky-600 btn btn-primary">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
        {{--    Este formulario solo envia una imagen al servidor--}}
        <div id="formImg">
            <form method="POST" action="{{ route('registerOfferWithOutData') }}" class="w-100 m-auto my-3" style="text-align: center" enctype="multipart/form-data">
                {{-- agrega campo oculto para poder manejar un token y evitar problemas de seguridad--}}
                @csrf
                <div class="mt-4">
                    <x-input-label for="offerImage" :value="__('Oferta de empleo')"/>
                    <input id="offerImage" class="block mt-1 w-full" type="file" name="offerImage"
                           :value="old('offerImage')" required autofocus autocomplete="offerImage"/>
                    <x-input-error :messages="$errors->get('offerImage')" class="mt-2"/>
                </div>
                <div class="m-auto" style="text-align: center">
                    <label for="" class="mx-2">Elija la empresa</label>
                    <select name="idCompany" id="selectForm" class="m-3">
                        @foreach($companies as $company)
                            <option value="{{ $company->email }}">{{ $company->nameCompany }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ml-4 bg-sky-600 btn btn-primary">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </x-guest-layout>
</div>
{{--llamamos a nuestro archivo js para poder validad el input de el select--}}
<script src="{{ asset('js/appRegisterOffer.js') }}"></script>
