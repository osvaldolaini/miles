@extends('layouts.template')
@section('content')

<x-app-breadcrumb >{{ __($title) }}</x-app-breadcrumb>

<div class="w-full space-y-2 my-3 ">
    <div class="w-full p-2 space-y-2 mt-5 lg:mt-0 bg-gray-100 dark:bg-gray-900 dark:text-gray-100 rounded-lg shadow-md">
        <section class="p-6 dark:bg-gray-800 dark:text-gray-50">
            <form action="../meus-pedidos" method="POST" id="form" class="container flex flex-col mx-auto space-y-12 ng-untouched ng-pristine ng-valid">
                <fieldset class="grid grid-cols-4 gap-6 p-6 rounded-md shadow-sm dark:bg-gray-900">
                    <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-4">
                        <div class="col-span-full sm:col-span-3">
                            <label for="miles" class="text-sm">Quantidade de Milhas</label>
                            <input value="{{ old('miles', $data->miles ?? '') }}" name="miles" required maxlength="10" onkeypress="masks(this,maskMiles)" type="text" placeholder="Milhas" class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-gray-700 dark:text-gray-900">
                        </div>
                        <div class="col-span-full sm:col-span-3">
                            <label for="qtd" class="text-sm">Quantidade de CPF</label>
                            <input value="{{ old('qtd', $data->qtd ?? '') }}" name="qtd" required type="number" placeholder="Quantidade de CPF" class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-gray-700 dark:text-gray-900">
                        </div>
                        <div class="col-span-full sm:col-span-3">
                            <label for="value" class="text-sm">Valor</label>
                            <input value="{{ old('value', $data->value ?? '') }}" maxlength="7" onkeypress="masks(this,maskMoney)"  name="value" required type="text" placeholder="Valor" class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-gray-700 dark:text-gray-900">
                        </div>
                        <div class="col-span-full sm:col-span-3">
                            <label for="value_max" class="text-sm">Valor máximo</label>
                            <input value="{{ old('value_max', $data->value_max ?? '') }}"  maxlength="7" onkeypress="masks(this,maskMoney)" name="value_max" required type="text" placeholder="Valor" class="w-full rounded-md focus:ring focus:ring-opacity-75 focus:ring-violet-400 dark:border-gray-700 dark:text-gray-900">
                        </div>
                        <div class="col-span-full ">
                            <h2 class="text-sm">Duração do pedido</label>
                        </div>
                        <div class="col-span-full sm:col-span-3">
                            <input
                                type="radio"
                                name="end_date"
                                value="{{ date('Y-m-d H:i:s' , strtotime('+30 minutes')) }}"
                                id="plus_thirty_minutes"
                                class="peer hidden"
                                checked
                            />
                            <label
                                for="plus_thirty_minutes"
                                class="flex cursor-pointer items-center justify-between rounded-lg shadow-md border border-gray-100 p-4 text-sm font-medium shadow-sm hover:border-gray-200 peer-checked:border-blue-500 peer-checked:ring-1 peer-checked:ring-blue-500"
                            >
                                <p class="text-gray-700">30 min</p>
                                <p class="text-gray-900">Free</p>
                            </label>
                        </div>
                        <div class="col-span-full sm:col-span-3">
                            <input
                                type="radio"
                                name="end_date"
                                value="{{ date('Y-m-d H:i:s' , strtotime('+1 hour')) }}"
                                id="plus_one_hour"
                                class="peer hidden"
                            />
                            <label
                                for="plus_one_hour"
                                class="flex cursor-pointer items-center justify-between rounded-lg shadow-md border border-gray-100 p-4 text-sm font-medium shadow-sm hover:border-gray-200 peer-checked:border-blue-500 peer-checked:ring-1 peer-checked:ring-blue-500"
                            >
                                <p class="text-gray-700">1 hora</p>
                                <p class="text-gray-900">Free</p>
                            </label>
                        </div>
                        <div class="col-span-full sm:col-span-3">
                            <input
                                type="radio"
                                name="end_date"
                                value="{{ date('Y-m-d H:i:s' , strtotime('+2 hours')) }}"
                                id="plus_two_hour"
                                class="peer hidden"
                            />
                            <label
                              for="plus_two_hour"
                              class="flex cursor-pointer items-center justify-between rounded-lg shadow-md border border-gray-100 p-4 text-sm font-medium shadow-sm hover:border-gray-200 peer-checked:border-blue-500 peer-checked:ring-1 peer-checked:ring-blue-500"
                            >
                                <p class="text-gray-700">2 horas</p>
                                <p class="text-gray-900">Free</p>
                            </label>
                        </div>
                        <div class="col-span-full sm:col-span-3">
                            <input
                                type="radio"
                                name="end_date"
                                value="{{ date('Y-m-d H:i:s' , strtotime('+24 hours')) }}"
                                id="plus_one_day"
                                class="peer hidden"
                            />
                            <label
                                for="plus_one_day"
                                class="flex cursor-pointer items-center justify-between rounded-lg shadow-md border border-gray-100 p-4 text-sm font-medium shadow-sm hover:border-gray-200 peer-checked:border-blue-500 peer-checked:ring-1 peer-checked:ring-blue-500"
                            >
                                <p class="text-gray-700">1 dia</p>
                                <p class="text-gray-900">Plano plus</p>
                            </label>
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
