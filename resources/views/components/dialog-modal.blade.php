@props(['id' => null, 'maxWidth' => null,'mt'=>null])

<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }} :mt="$mt">
    <div class="px-6 py-4">
        <div class="text-lg font-medium text-gray-900 dark:text-gray-100 text-left">
            {{ $title }}
        </div>

        <div class="mt-4 text-sm text-gray-600 dark:text-gray-400 text-left">
            {{ $content }}
        </div>
    </div>

    <div class="flex flex-row justify-end px-6 py-4 bg-gray-100 dark:bg-gray-800 text-right">
        {{ $footer }}
    </div>
</x-modal>
