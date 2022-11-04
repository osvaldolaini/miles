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
    @if (isset($data))
        @foreach ($data as $demand)
            <x-app-demand :data='$demand'></x-app-demand>
        @endforeach
    @endif

    {{ $data->links() }}
    {{-- <div class="flex justify-center space-x-1 dark:text-gray-100">
        <button title="previous" type="button" class="inline-flex items-center justify-center w-8 h-8 py-0 border rounded-md shadow-md dark:bg-gray-900 dark:border-gray-800">
            <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-4">
                <polyline points="15 18 9 12 15 6"></polyline>
            </svg>
        </button>
        <button title="next" type="button" class="inline-flex items-center justify-center w-8 h-8 py-0 border rounded-md shadow-md dark:bg-gray-900 dark:border-gray-800">
            <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-4">
                <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
        </button>
    </div> --}}

</div>

@endsection
