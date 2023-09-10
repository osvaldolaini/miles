@props(['filter' => false])
<div class="w-full p-2 space-y-2 mt-5 lg:mt-0 bg-gray-100
            dark:bg-gray-800 dark:text-gray-100 rounded-lg shadow-md">
    <div class="flex items-center mx-auto container justify-between py-2">
        <div class="text-left">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white">
                {{ $slot }}
            </h3>
        </div>
        @if ($filter == true)
            <div class="text-right">
                @livewire('app.btn-filters')
            </div>
        @endif
    </div>
</div>
