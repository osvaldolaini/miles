@extends('layouts.template')
@section('content')

<x-app-breadcrumb >{{ __($title) }}</x-app-breadcrumb>

<div class="w-full space-y-2 my-3 ">
    <div class="w-full p-2 space-y-2 mt-5 lg:mt-0 bg-gray-100 dark:bg-gray-900 dark:text-gray-100 rounded-lg shadow-md">
        <section class="p-6 dark:bg-gray-800 dark:text-gray-50">
            <form action="editar-meu-cadastro" method="POST" id="form" class="container flex flex-col mx-auto space-y-12 ng-untouched ng-pristine ng-valid">
                <fieldset class="grid grid-cols-4 gap-6 p-6 rounded-md shadow-sm dark:bg-gray-900">
                    <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-4">
                        <div class="col-span-full ">
                            <label for="name" class="text-sm">Nome completo</label>
                            <input value="{{ old('name', $data->name ?? '') }}" name="name" required type="text" placeholder="Nome" class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-gray-700 dark:text-gray-900">
                        </div>
                        <div class="col-span-full sm:col-span-3">
                            <label for="username" class="text-sm">Usuário / apelido</label>
                            <input value="{{ old('username', $data->username ?? '') }}" name="username" required type="text" placeholder="Usuário" class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-gray-700 dark:text-gray-900">
                        </div>
                        <div class="col-span-full sm:col-span-3">
                            <label for="email" class="text-sm">Email</label>
                            <input value="{{ old('email', $data->email ?? '') }}" name="email" required type="email" placeholder="Email" class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-gray-700 dark:text-gray-900">
                        </div>

                        <div class="col-span-full sm:col-span-3">
                            <label for="cpf" class="text-sm">CPF</label>
                            <input value="{{ old('cpf', $data->cpf ?? '') }}" name="cpf" required type="text" placeholder="CPF" class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-gray-700 dark:text-gray-900">
                        </div>
                        <div class="col-span-full sm:col-span-3">
                            <label for="phone" class="text-sm">Contato</label>
                            <input value="{{ old('phone', $data->phone ?? '') }}" name="phone" required type="text" placeholder="Contato" class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-gray-700 dark:text-gray-900">
                        </div>
                        <div class="col-span-full">
                            <label for="bio" class="text-sm">Bio</label>
                            <textarea name="bio" placeholder="" class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-gray-700 dark:text-gray-900">{{ old('bio', $data->bio ?? '') }}</textarea>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="grid grid-cols-4 gap-6 p-6 rounded-md shadow-sm dark:bg-gray-900">
                    {{-- <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3">
                        <div class="col-span-full">
                            <label for="bio" class="text-sm">Photo</label>
                            <div class="flex items-center space-x-2">
                                <img src="https://source.unsplash.com/30x30/?random" alt="" class="w-10 h-10 rounded-full dark:bg-gray-500 dark:bg-gray-700">
                                <button type="button" class="px-4 py-2 border rounded-md dark:border-gray-100">Change</button>
                            </div>
                        </div>
                    </div> --}}
                    <div class="grid  gap-4 col-span-full lg:col-span-4 justify-end">
                        <x-app-button >
                            {{ __('Save') }}
                        </x-app-button>
                    </div>
                </fieldset>
            </form>
        </section>
    </div>
</div>
@endsection
