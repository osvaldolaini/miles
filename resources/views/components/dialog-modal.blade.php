@props(['id' => null, 'maxWidth' => null,'mt'=>null])

<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }} :mt="$mt">
    <div class="px-6 py-4 bg-gray-100 text-gray-900  dark:bg-gray-900 dark:text-white">
        <div class="text-lg font-medium text-left dark:bg-gray-800">
            {{ $title }}
        </div>

        <div class="mt-4 text-sm text-left">
            {{ $content }}
        </div>
    </div>

    <div class="flex flex-row justify-end px-6 py-4 bg-gray-100 dark:bg-gray-800 text-right">
        {{ $footer }}
    </div>
</x-modal>
