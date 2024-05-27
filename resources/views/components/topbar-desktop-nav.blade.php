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
</nav>
