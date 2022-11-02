<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
        <div class="flex items-center justify-center mb-3 mt-2">
            <p class="text-center text-lg font-bold mx-4 mb-0">
                {{ __('Forgot your password?') }}
            </p>
        </div>
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Não se preocupe! Insira o seu e-mail de cadastro e enviaremos instruções para você.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="block items-center justify-end mt-4 w-full">
                {{-- <x-button>
                    {{ __('Email Password Reset Link') }}
                </x-button> --}}
                <x-button-sign >
                    {{ __('Email Password Reset Link') }}
                </x-button-sign>
            </div>
        </form>
        <div class="flex items-center mt-3 mb-2 before:flex-1 before:border-t before:border-gray-300 before:mt-0.5 after:flex-1 after:border-t after:border-gray-300 after:mt-0.5"></div>

        <div class="flex items-center justify-center mt-0 pt-0" >
            @if (Route::has('login'))
                <a class="text-md text-sky-900 hover:sky-700 font-bold mr-2" href="{{ route('login') }}">
                    {{ __(' Clique aqui') }}
                </a>
                {{ __('para voltar ') }}
            @endif
        </div>
    </x-auth-card>
</x-guest-layout>
