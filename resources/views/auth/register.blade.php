<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <!-- Sign in socialite -->
            <div class="flex items-center justify-center mb-3 mt-2">
                <p class="text-center text-lg font-bold mx-4 mb-0">Crie sua conta</p>
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

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="block items-center justify-end mt-4 w-full">
                {{-- <x-button>
                    {{ __('Email Password Reset Link') }}
                </x-button> --}}
                <x-button-sign >
                    {{ __('Register') }}
                </x-button-sign>
            </div>
        </form>
        <div class="flex items-center mt-3 mb-2 before:flex-1 before:border-t before:border-gray-300 before:mt-0.5 after:flex-1 after:border-t after:border-gray-300 after:mt-0.5"></div>

        <div class="flex items-center justify-center mt-0 pt-0" >
            @if (Route::has('login'))
                    {{ __('Already registered?') }}
                <a class="text-md text-sky-900 hover:sky-700 font-bold ml-2" href="{{ route('login') }}">
                    {{ __(' Clique aqui para voltar.') }}
                </a>
            @endif
        </div>
    </x-auth-card>
</x-guest-layout>
