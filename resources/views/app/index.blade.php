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
    {{-- <div class="flex items-center mx-auto container justify-center md:justify-between py-2"> --}}
        <x-app-demand :data="true"></x-app-demand>
        {{-- @include('app.sessions.demand') --}}
    {{-- </div> --}}
</div>

@endsection


