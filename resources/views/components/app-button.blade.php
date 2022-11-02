<div class="flex space-x-2 justify-center py-1" >
    <button
        {{ $attributes->merge([
            'type' => 'submit',
            'data-mdb-ripple'=>'true',
            'data-mdb-ripple-color'=>'light',
            'class'=>'mb-2 mt-1.5 w-full inline-block px-6 py-3 cursor-pointer
            bg-blue-600 text-white font-medium text-xs leading-normal text-center
            uppercase rounded shadow-md font-bold
            hover:py-2.5 hover:border-2 hover:border-blue-600 hover:bg-white hover:text-blue-600
            focus:border-blue-600 focus:text-white focus:outline-none focus:outline-none focus:ring-0
            active:bg-white active:text-white active:shadow-lg transition duration-150 ease-in-out',
            ])
        }}>
    {{ $slot }}
    </button>
</div>
