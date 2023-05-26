<div class="hidden lg:flex lg:flex-col lg:w-64 lg:fixed lg:inset-y-0 lg:border-r lg:border-gray-200 lg:bg-gray-100">
    <div class="flex items-center flex-shrink-0 px-6 py-1">
        <img class="w-auto h-8" src="{{ $company->logoUrl() }}" alt="Workflow">
        <span class="flex flex-col flex-1 min-w-0 pl-2">
            <span class="text-sm font-medium text-gray-900 truncate">{{ $company->name }}</span>
            {{-- <span class="text-sm text-gray-500 truncate">{{ $company->address }}</span> --}}
        </span>
    </div>
    <!-- Sidebar component, swap this element with another sidebar if you like -->

    <x-sidebar-content />

</div>
