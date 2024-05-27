<div x-data="{openSidebarMobile:false}">
    <div class="min-h-screen bg-gray-100 ">

        {{-- ################# For Mobile --}}
        <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
        <x-sidebar-mobile />

        {{-- ##################### --}}
        <!-- Static sidebar for desktop -->
        <x-sidebar-desktop />

        <!-- Main column -->
        <div class="flex flex-col lg:pl-64">

            <!-- Topbar Mobile -->
            {{-- <x-topbar-mobile /> --}}

            <main class="flex-1">

                <!-- Topbar Desktop -->
                <x-topbar-desktop>
                    <li class="flex">
                        <div class="flex items-center">
                            <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg"aria-hidden="true">
                                <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                            </svg>
                            <a href="#" class="ml-4 text-sm font-medium text-white hover:text-blue-200">
                                Dashboard
                            </a>
                        </div>
                    </li>

                    <x-slot name="pending_notif">
                        {{ $pending_count }}
                    </x-slot>
                </x-topbar-desktop>

                <!-- Dashboard Status -->
                <x-dashboard.stats-v1 />

                <!-- Dashboard Redirect functions -->
                <x-dashboard.redirect-v1 />

            </main>
        </div>
    </div>
</div>
