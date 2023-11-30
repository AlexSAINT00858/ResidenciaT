<div class="w-50 rounded-4 border border-4 m-auto align-self-center my-5">
    <x-guest-layout>
        <!-- Session Status -->
        <x-auth-session-status class="mb-6" :status="session('status')"/>
        <div class="row w-75 m-auto">
            <img src="{{ asset('images/iniciar-sesion.jpg') }}" style="width: 40%" alt="" class="col-md-4 m-auto">
        </div>
        <form method="POST" action="{{ route('login') }}" class="w-100 m-auto align-self-center my-3"
              style="text-align: center">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Correo')"/>
                <br>
                <x-text-input id="email" class="block mt-1 w-75" type="email" name="email" :value="old('email')"
                              required autofocus autocomplete="username"/>
                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Contraseña')"/>
                <br>
                <x-text-input id="password" class="block mt-1 w-75"
                              type="password"
                              name="password"
                              required autocomplete="current-password"/>

                <x-input-error :messages="$errors->get('password')" class="mt-2"/>
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                           class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                           name="remember">
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex mt-4 w-100">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                       href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="ml-3 btn btn-primary m-auto">
                    {{ __('Inisiar sesion') }}
                </x-primary-button>
            </div>
        </form>
    </x-guest-layout>
</div>
