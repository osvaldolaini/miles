<div class="flex space-x-2 justify-center py-1" >
    <button-socialite
        {{ $attributes->merge([
            'type' => 'button',
            'data-mdb-ripple'=>'true',
            'data-mdb-ripple-color'=>'light',
            'class'=>'inline-block px-6 py-3 text-white w-full text-center cursor-pointer
            font-medium text-xs leading-tight uppercase rounded-full
            shadow-md  hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0
             active:shadow-lg transition duration-150 ease-in-out',
            ])
        }}>
    {{ $slot }}
    </button-socialite>
</div>
