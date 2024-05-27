<nav class="flex bg-blue-500 border-b border-gray-200" aria-label="Breadcrumb">
    <ol role="list" class="flex w-full pl-3 space-x-4">
        <li class="flex">
            <div class="flex items-center">
                <a x-on:click="openSidebarMobile = !openSidebarMobile" href="#" class="text-white hover:font-semibold">
                    <!-- Heroicon name: solid/home -->
                    <x-icon.home class="flex-shrink-0 w-5 h-5" />
                    <span class="sr-only">Home</span>
                </a>
            </div>
        </li>

        {{ $slot }}

    </ol>
    <div x-data="{profileDropdown:false, notificationDropdown:false }" class="flex items-center">
        <div>
            <div class="relative inline-flex w-fit">
                <div class="absolute top-0 right-0 bottom-auto left-auto z-10 inline-block px-1 text-xs font-bold leading-none text-center align-baseline scale-x-100 scale-y-100 rotate-0 skew-x-0 skew-y-0 bg-white rounded-full whitespace-nowrap">
                  {{-- {{ $pending_notif }} --}}
                  3
                </div>
                <button x-on:click="notificationDropdown = !notificationDropdown" type="button" class="p-1 text-indigo-300 rounded-full hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-300">
                    <span class="sr-only">View notifications</span>
                    <!-- Heroicon name: outline/bell -->
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                </button>
                <div x-show="notificationDropdown" @click.away="notificationDropdown = false" x-transition.duration.500ms
                    class="absolute z-10 w-48 mx-3 mt-1 origin-top-right bg-white divide-y divide-gray-200 rounded-md shadow-lg right-10 ring-1 ring-black ring-opacity-5 focus:outline-none"
                    style="display: none;">
                    <div class="py-1" role="none">
                        <a href="{{ route('pending-documents',['user_id'=>Auth::user()->id]) }}" class="block px-4 py-2 text-sm text-gray-700">View</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Profile dropdown -->
        <div class="relative ml-1">
          <div class="w-10">
            <button x-on:click="profileDropdown =! profileDropdown" type="button" class="flex items-center max-w-xs text-sm bg-white rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
              <span class="sr-only">Open user menu</span>
              <img class="w-8 h-8 rounded-full" src="{{ url('img/users/avatar.png') }}" alt="user avatar">
            </button>
          </div>
          <div x-show="profileDropdown" @click.away="profileDropdown = false" x-transition.duration.500ms class="absolute right-0 z-10 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
            <!-- Active: "bg-gray-100", Not Active: "" -->
            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>

            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>

            <a wire:click='logout()' href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
          </div>
        </div>
</nav>
