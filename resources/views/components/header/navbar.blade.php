<nav class="text-white bg-blue-600 border-2 border-gray-300" x-data="{userDropdown:false, openMenuMobile:false}">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            {{-- <img class="w-8 h-8" src="https://tailwindui.com/img/logos/workflow-mark-indigo-300.svg" alt="Workflow"> --}}
            <div class="flex items-center flex-shrink-0 px-6">
                <img class="w-auto h-8" src="{{ asset(env('APP_LOGO')) }}" alt="Logo">
                <span class="flex flex-col flex-1 min-w-0 pl-2">
                    <span class="text-sm font-medium truncate">{{ env('APP_CLIENT') }}</span>
                    <span class="text-sm truncate">{{ env('APP_PROVINCE') }}</span>
                </span>
            </div>
        </div>
          <div class="hidden md:block">
            <div class="flex items-baseline ml-10 space-x-4">
              {{ $slot }}
            </div>
          </div>
        </div>

      </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div x-show="openMenuMobile" class="md:hidden" id="mobile-menu">
      {{-- <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
        <!-- Current: "bg-indigo-700 text-white", Default: "text-white hover:bg-indigo-500 hover:bg-opacity-75" -->
        <a href="#" class="block px-3 py-2 text-base font-medium bg-gray-400 rounded-md hover:text-white" aria-current="page">Dashboard</a>

        <a href="#" class="block px-3 py-2 text-base font-medium rounded-md hover:text-white hover:bg-indigo-500 hover:bg-opacity-75">Team</a>

        <a href="#" class="block px-3 py-2 text-base font-medium rounded-md hover:text-white hover:bg-indigo-500 hover:bg-opacity-75">Projects</a>

        <a href="#" class="block px-3 py-2 text-base font-medium rounded-md hover:text-white hover:bg-indigo-500 hover:bg-opacity-75">Calendar</a>

        <a href="#" class="block px-3 py-2 text-base font-medium rounded-md hover:text-white hover:bg-indigo-500 hover:bg-opacity-75">Reports</a>
      </div>
      <div class="pt-4 pb-3 border-t border-gray-700">
        <div class="flex items-center px-5">
          <div class="flex-shrink-0">
            <img class="w-10 h-10 rounded-full" src="{{ asset('img/users/avatar.png') }}" alt="User profile">
          </div>
          <div class="ml-3">
            <div class="text-base font-medium">{{ auth()->user()->fullname }}</div>
            <div class="text-sm font-medium text-gray-500">{{ auth()->user()->email }}</div>
          </div>
          <button type="button" class="flex-shrink-0 p-1 ml-auto text-gray-200 bg-gray-500 border-2 border-transparent rounded-full hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-indigo-600 focus:ring-white">
            <span class="sr-only">View notifications</span>
            <!-- Heroicon name: outline/bell -->
            <x-icon.bell class="w-6 h-6" />
          </button>
        </div>
        <div class="px-2 mt-3 space-y-1">
            <a onclick="window.open('{{ route('Profile Settings',['user_id'=>Auth::user()->id]) }}','_blank')" href="#"
                class="block px-4 py-2 text-sm" id="options-menu-item-0">View profile</a>
            <a href="#"
                class="block px-4 py-2 text-sm" id="options-menu-item-2">Notifications</a>
            <a wire:click='logout()' href="#"
                class="block px-4 py-2 text-sm" id="options-menu-item-5">Logout</a>
        </div>
      </div> --}}
    </div>
  </nav>
