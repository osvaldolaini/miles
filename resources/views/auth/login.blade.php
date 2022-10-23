<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-sky-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <!-- Sign in socialite -->
        <div class="flex items-center justify-center mb-3 mt-2">
            <p class="text-center text-lg font-bold mx-4 mb-0">Acesse a sua conta</p>
        </div>
        <x-button-socialite class="bg-blue-800 hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-700"
            href="{{ __(route('auth.social.redirect',['driver'=>'google']) )}}" >
            <span class="fa-brands fa-google fa-xl mx-1"></span>
            {{ __('Entrar com o Google') }}
        </x-button-socialite>
        <x-button-socialite class="bg-blue-400 hover:bg-blue-500 focus:bg-blue-500 active:bg-blue-600"
            href="{{ __(route('auth.social.redirect',['driver'=>'facebook']) )}}" >
            <span class="fa-brands fa-facebook-f fa-xl mx-1"></span>
            {{ __('Entrar com o Facebook') }}
        </x-button-socialite>

        <div class="flex items-center mt-4 mb-2 before:flex-1 before:border-t before:border-gray-300 before:mt-0.5 after:flex-1 after:border-t after:border-gray-300 after:mt-0.5">
            <p class="text-center font-semibold mx-4 mb-0">OU</p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <div class="flex">
                    <x-label for="password" :value="__('Password')" />
                    <div class="flex items-center justify-end w-3/5">
                        @if (Route::has('password.request'))
                            <a class="text-md text-sky-900 hover:sky-700 font-bold" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>
                </div>

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>
            <!-- Remember Me -->
            {{-- <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Manter conectado') }}</span>
                </label>
            </div> --}}
            <!-- Submit button -->
            <x-button-sign >
                {{ __('Enter') }}
            </x-button-sign>
        </form>
        <div class="flex items-center mt-3 mb-2 before:flex-1 before:border-t before:border-gray-300 before:mt-0.5 after:flex-1 after:border-t after:border-gray-300 after:mt-0.5"></div>

        <div class="flex items-center justify-center mt-0 pt-0" >
            @if (Route::has('register'))
                <a class="text-md text-sky-900 hover:sky-700 font-bold" href="{{ route('register') }}">
                    {{ __('Não tem uma conta?') }}
                </a>
            @endif
        </div>

    </x-auth-card>
</x-guest-layout>
