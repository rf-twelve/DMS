<div class="flex flex-col flex-1 mt-1 overflow-y-auto bg-blue-500">
    <!-- Sidebar Search -->
    {{-- <div class="px-3 mt-5">
        <label for="search" class="sr-only">Search</label>
        <div class="relative mt-1 rounded-md shadow-sm">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none" aria-hidden="true">
                <!-- Heroicon name: solid/search -->
                <svg class="w-4 h-4 mr-3 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        clip-rule="evenodd" />
                </svg>
            </div>
            <input type="text" name="search" id="search"
                class="block w-full py-2 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 pl-9 sm:text-sm"
                placeholder="Searched">
        </div>
    </div> --}}
    <!-- Navigation -->
    <nav class="flex-1 px-2 pt-2 space-y-1" aria-label="Sidebar">
        <div>
            <!-- Current: "bg-gray-100 text-gray-900", Default: "bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900" -->
            <a href="{{ route('dashboard',['user_id'=>Auth::user()->id]) }}"
                class="flex items-center w-full py-2 pl-2 text-sm font-medium text-white border-2 rounded-md group">
                <x-icon.user-circle class="flex-shrink-0 w-6 h-6 mr-3" />
                {{ Str::upper(Auth::user()->fullname) }}
            </a>
        </div>
        <div>
            <!-- Current: "bg-gray-100 text-gray-900", Default: "bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900" -->
            <a href="{{ route('dashboard',['user_id'=>Auth::user()->id]) }}"
                class="flex items-center w-full py-2 pl-2 text-sm font-medium text-blue-700 bg-blue-200 rounded-md group">
                <x-icon.home class="flex-shrink-0 w-6 h-6 mr-3" />
                DASHBOARD
            </a>
        </div>


        <div class="space-y-1">
            <!-- Current: "bg-gray-100 text-gray-900", Default: "bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900" -->
            <button type="button"
                class="flex items-center w-full py-2 pl-2 pr-1 text-sm font-medium text-left text-blue-700 bg-blue-200 rounded-md hover:bg-gray-50 hover:text-gray-900 group focus:outline-none focus:ring-2 focus:ring-indigo-500"
                aria-controls="sub-menu-4" aria-expanded="false">
                <x-icon.document class="flex-shrink-0 w-6 h-6 mr-3" />
                <span class="flex-1"> DOCUMENTS </span>
                <!-- Expanded: "text-gray-400 rotate-90", Collapsed: "text-gray-300" -->
                <x-icon.arrow-head class="flex-shrink-0 w-5 h-5 ml-3 text-gray-300 transition-colors duration-150 ease-in-out transform rotate-90 group-hover:text-gray-400"/>
            </button>
            <!-- Expandable link section, show/hide based on state. -->
            <div class="space-y-1" id="sub-menu-4">
                <a href="{{ route('my-documents',['user_id'=>Auth::user()->id]) }}"
                    class="flex items-center w-full py-2 pr-2 text-sm font-medium text-blue-100 rounded-md group pl-11 hover:text-gray-900 hover:bg-gray-50">
                    <x-icon.folder-open class="flex-shrink-0 w-5 h-5 mr-1"/>
                <span class="flex-1"> My Documents </span></a>

                <a href="{{ route('office-documents',['user_id'=>Auth::user()->id]) }}"
                    class="flex items-center w-full py-2 pr-2 text-sm font-medium text-blue-100 rounded-md group pl-11 hover:text-gray-900 hover:bg-gray-50">
                    <x-icon.folder-open class="flex-shrink-0 w-5 h-5 mr-1"/>
                <span class="flex-1"> Office Documents </span></a>

                <a href="{{ route('shared-documents',['user_id'=>Auth::user()->id]) }}"
                    class="flex items-center w-full py-2 pr-2 text-sm font-medium text-blue-100 rounded-md group pl-11 hover:text-gray-900 hover:bg-gray-50">
                    <x-icon.folder-open class="flex-shrink-0 w-5 h-5 mr-1"/>
                <span class="flex-1"> Shared Documents </span></a>

                <a href="{{ route('pending-documents',['user_id'=>Auth::user()->id]) }}"
                    class="flex items-center w-full py-2 pr-2 text-sm font-medium text-blue-100 rounded-md group pl-11 hover:text-gray-900 hover:bg-gray-50">
                    <x-icon.clock class="flex-shrink-0 w-5 h-5 mr-1"/>
                <span class="flex-1"> Pending Documents </span></a>

                <a href="{{ route('received-documents',['user_id'=>Auth::user()->id]) }}"
                    class="flex items-center w-full py-2 pr-2 text-sm font-medium text-blue-100 rounded-md group pl-11 hover:text-gray-900 hover:bg-gray-50">
                    <x-icon.arrows-right-left class="flex-shrink-0 w-5 h-5 mr-1"/>
                <span class="flex-1"> Received / Released </span></a>

                <a href="{{ route('terminal-documents',['user_id'=>Auth::user()->id]) }}"
                    class="flex items-center w-full py-2 pr-2 text-sm font-medium text-blue-100 rounded-md group pl-11 hover:text-gray-900 hover:bg-gray-50">
                    <x-icon.folder-minus class="flex-shrink-0 w-5 h-5 mr-1"/>
                <span class="flex-1"> Terminal Documents </span></a>

            </div>
        </div>

        <div class="space-y-1">
            <!-- Current: "bg-gray-100 text-gray-900", Default: "bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900" -->
            <button type="button"
                class="flex items-center w-full py-2 pl-2 pr-1 text-sm font-medium text-left text-blue-700 bg-blue-200 rounded-md hover:bg-gray-50 hover:text-gray-900 group focus:outline-none focus:ring-2 focus:ring-indigo-500"
                aria-controls="sub-menu-4" aria-expanded="false">
                <x-icon.settings class="flex-shrink-0 w-6 h-6 mr-3" />
                <span class="flex-1"> SETTINGS </span>
                <!-- Expanded: "text-gray-400 rotate-90", Collapsed: "text-gray-300" -->
                <x-icon.arrow-head class="flex-shrink-0 w-5 h-5 ml-3 text-gray-300 transition-colors duration-150 ease-in-out transform rotate-90 group-hover:text-gray-400"/>
            </button>
            <!-- Expandable link section, show/hide based on state. -->
            <div class="space-y-1" id="sub-menu-4">

                <a href="{{ route('user-management',['user_id'=>Auth::user()->id]) }}"
                    class="flex items-center w-full py-2 pr-2 text-sm font-medium text-blue-100 rounded-md group pl-11 hover:text-gray-900 hover:bg-gray-50">
                    <x-icon.users class="flex-shrink-0 w-5 h-5 mr-1"/>
                <span class="flex-1"> User Management </span></a>

            </div>
            {{-- <div class="space-y-1" id="sub-menu-4">

                <a href="{{ route('company-profile',['user_id'=>Auth::user()->id]) }}"
                    class="flex items-center w-full py-2 pr-2 text-sm font-medium text-blue-100 rounded-md group pl-11 hover:text-gray-900 hover:bg-gray-50">
                    <x-icon.users class="flex-shrink-0 w-5 h-5 mr-1"/>
                <span class="flex-1"> Company Profile </span></a>

            </div> --}}
        </div>

        {{-- <div class="mt-8 text-center bg-blue-100">
            <!-- Secondary navigation -->
            <h3 class="px-3 text-xs font-semibold tracking-wider text-gray-500 uppercase"
                id="desktop-teams-headline">ZELEKTRONICA 2023 v2</h3>

        </div> --}}
        {{-- <div class="mt-8">
            <!-- Secondary navigation -->
            <h3 class="px-3 text-xs font-semibold tracking-wider text-gray-500 uppercase"
                id="desktop-teams-headline">CONNECTION STATUS</h3>
            <div class="mt-1 space-y-1" role="group" aria-labelledby="desktop-teams-headline">
                <a href="#"
                    class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md group hover:text-gray-900 hover:bg-gray-50">
                    <span class="w-2.5 h-2.5 mr-4 bg-indigo-500 rounded-full" aria-hidden="true"></span>
                    <span class="truncate"> Engineering </span>
                </a>

                <a href="#"
                    class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md group hover:text-gray-900 hover:bg-gray-50">
                    <span class="w-2.5 h-2.5 mr-4 bg-green-500 rounded-full" aria-hidden="true"></span>
                    <span class="truncate"> Server: 192.168.82.6 </span>
                </a>

                <a href="#"
                    class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md group hover:text-gray-900 hover:bg-gray-50">
                    <span class="w-2.5 h-2.5 mr-4 bg-yellow-500 rounded-full" aria-hidden="true"></span>
                    <span class="truncate"> Customer Success </span>
                </a>
            </div>
        </div> --}}
    </nav>
</div>
