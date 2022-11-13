@extends('layouts.template')
@section('content')
{{-- <div class="relative items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 w-full">
        <div class="mt-10 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg w-full">
            <div class="grid mt-10  w-full">
                <div class="p-6 lg:mt-10 w-full">
                    @include('sessions.searchs.search')
                </div>
            </div>
        </div>
    </div>
</div> --}}


<x-app-breadcrumb >{{ __($title) }}</x-app-breadcrumb>

<div class="w-full space-y-2 my-3 ">
    <div role="status" class="hidden container-fluid py-6 bg-gray-100 dark:bg-gray-900 dark:text-gray-100 my-2 ">
        <div class="flex px-2 items-center animate-pulse justify-start py-0 px-3">
            <div class="flex-shrink-0 w-10 h-10 rounded-full bg-teal-300 dark:bg-gray-700"></div>
            <div class="flex-1 space-y-4 px-3 ">
                <div class="w-2/6 h-3 rounded bg-teal-300 dark:bg-gray-700"></div>
                <div class="w-2/6 h-3 rounded bg-teal-300 dark:bg-gray-700"></div>
            </div>
            <div class="block space-y-4 px-8 ">
                <div class="h-5 bg-teal-300 rounded-full dark:bg-gray-700 w-12"></div>
                <div class="h-2.5 bg-teal-300 rounded-full dark:bg-gray-700 w-12"></div>
                <div class="h-2.5 bg-teal-300 rounded-full dark:bg-gray-700 w-12"></div>
            </div>
        </div>
        <span class="sr-only">Loading...</span>
    </div>
    <div id="demands" ></div>
    {{-- @if (isset($data))
        @foreach ($data as $demand)
            <x-app-demand :data='$demand'></x-app-demand>
        @endforeach
    @endif --}}
</div>

@endsection


