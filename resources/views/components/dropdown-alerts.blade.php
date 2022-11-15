<div x-data="{ open: false }" class="relative inline-block">
    <!-- Dropdown toggle button -->
    <div @click="open = !open" class="flex justify-center items-center space-x-3 cursor-pointer" >
        <div class="font-semibold text-white">
            <div class="cursor-pointer"><i class="fa-solid fa-bell"></i> <span class="sm:hidden">Notificações</span>
            </div>
        </div>
    </div>
    <!-- Dropdown menu -->
    <div x-show="open"
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90"
        class="absolute right-0 z-20 w-64 mt-2 overflow-hidden bg-white rounded-md shadow-lg sm:w-80 dark:bg-gray-800"
     >
        <div class="py-2">
            <a href="#" class="flex items-center px-4 py-3 -mx-2 transition-colors duration-300 transform border-b border-gray-100 hover:bg-gray-50 dark:hover:bg-gray-700 dark:border-gray-700">
                <img class="flex-shrink-0 object-cover w-8 h-8 mx-1 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80" alt="avatar" />
                <p class="mx-2 text-sm text-gray-600 dark:text-white"><span class="font-bold" href="#">Sara Salah</span> replied on the <span class="text-blue-500 hover:underline" href="#">Upload Image</span> artical . 2m</p>
            </a>
            <a href="#" class="flex items-center px-4 py-3 -mx-2 transition-colors duration-300 transform border-b border-gray-100 hover:bg-gray-50 dark:hover:bg-gray-700 dark:border-gray-700">
                <img class="flex-shrink-0 object-cover w-8 h-8 mx-1 rounded-full" src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80" alt="avatar" />
                <p class="mx-2 text-sm text-gray-600 dark:text-white"><span class="font-bold" href="#">Slick Net</span> start following you . 45m</p>
            </a>
            <a href="#" class="flex items-center px-4 py-3 -mx-2 transition-colors duration-300 transform border-b border-gray-100 hover:bg-gray-50 dark:hover:bg-gray-700 dark:border-gray-700">
                <img class="flex-shrink-0 object-cover w-8 h-8 mx-1 rounded-full" src="https://images.unsplash.com/photo-1450297350677-623de575f31c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80" alt="avatar" />
                <p class="mx-2 text-sm text-gray-600 dark:text-white"><span class="font-bold" href="#">Jane Doe</span> Like Your reply on <span class="text-blue-500 hover:underline" href="#">Test with TDD</span> artical . 1h</p>
            </a>
            <a href="#" class="flex items-center px-4 py-3 -mx-2 transition-colors duration-300 transform hover:bg-gray-100 dark:hover:bg-gray-700">
                <img class="flex-shrink-0 object-cover w-8 h-8 mx-1 rounded-full" src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=398&q=80" alt="avatar" />
                <p class="mx-2 text-sm text-gray-600 dark:text-white"><span class="font-bold" href="#">Abigail Bennett</span> start following you . 3h</p>
            </a>
        </div>
        <a href="#" class="block py-2 font-bold text-center text-white bg-gray-800 dark:bg-gray-700 hover:underline">See all notifications</a>
    </div>
</div>
