<div class="px-4 mt-2 sm:px-6 lg:px-8">
    <h2 class="text-xs font-medium tracking-wide text-gray-500 uppercase">Document Status</h2>
    <ul role="list" class="grid grid-cols-1 gap-4 mt-3 sm:gap-6 sm:grid-cols-2 xl:grid-cols-4"
        x-max="1">

        <li class="relative flex col-span-1 rounded-md shadow-sm">
            <div
                class="flex items-center justify-center flex-shrink-0 w-16 text-sm font-medium text-white bg-indigo-600 rounded-l-md">
                <x-icon.folder-open class="flex-shrink-0 w-6 h-6 text-white" />
            </div>
            <div
                class="flex items-center justify-between flex-1 truncate bg-white border-t border-b border-r border-gray-200 rounded-r-md">
                <div class="flex-1 px-4 py-2 text-sm truncate">
                    <a href="#" class="font-medium text-gray-900 hover:text-gray-600">
                        My Documents
                    </a>
                    <p class="text-gray-500">{{ $my_docs_count }} Records</p>
                </div>
                <div x-data="{openOptions:false}" @click.away="openOptions = false"
                    class="flex-shrink-0 pr-2">
                    <button type="button" x-on:click="openOptions = !openOptions"
                        class="inline-flex items-center justify-center w-8 h-8 text-gray-400 bg-white rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">
                        <x-icon.dots-vertical class="w-5 h-5" />
                    </button>

                    <div x-show="openOptions" x-transition.duration.500ms
                        class="absolute z-10 w-48 mx-3 mt-1 origin-top-right bg-white divide-y divide-gray-200 rounded-md shadow-lg right-10 top-3 ring-1 ring-black ring-opacity-5 focus:outline-none"
                        style="display: none;">
                        <div class="py-1" role="none">
                            <a href="{{ route('my-documents',['user_id'=>Auth::user()->id]) }}" class="block px-4 py-2 text-sm text-gray-700">View</a>
                        </div>
                    </div>

                </div>
            </div>
        </li>

        <li class="relative flex col-span-1 rounded-md shadow-sm">
            <div
                class="flex items-center justify-center flex-shrink-0 w-16 text-sm font-medium text-white bg-yellow-500 rounded-l-md">
                <x-icon.folder-open class="flex-shrink-0 w-6 h-6 text-white" />
            </div>
            <div
                class="flex items-center justify-between flex-1 truncate bg-white border-t border-b border-r border-gray-200 rounded-r-md">
                <div class="flex-1 px-4 py-2 text-sm truncate">
                    <a href="#" class="font-medium text-gray-900 hover:text-gray-600">
                        Office Documents
                    </a>
                    <p class="text-gray-500">{{ $office_docs_count }} Records</p>
                </div>
                <div x-data="{openOptions:false}" @click.away="openOptions = false"
                    class="flex-shrink-0 pr-2">
                    <button type="button" x-on:click="openOptions = !openOptions"
                        class="inline-flex items-center justify-center w-8 h-8 text-gray-400 bg-white rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                        <x-icon.dots-vertical class="w-5 h-5" />
                    </button>

                    <div x-show="openOptions" x-transition.duration.500ms
                        class="absolute z-10 w-48 mx-3 mt-1 origin-top-right bg-white divide-y divide-gray-200 rounded-md shadow-lg right-10 top-3 ring-1 ring-black ring-opacity-5 focus:outline-none"
                        style="display: none;">
                        <div class="py-1" role="none">
                            <a href="{{ route('office-documents',['user_id'=>Auth::user()->id]) }}" class="block px-4 py-2 text-sm text-gray-700">View</a>
                        </div>
                    </div>

                </div>
            </div>
        </li>

        <li class="relative flex col-span-1 rounded-md shadow-sm">
            <div
                class="flex items-center justify-center flex-shrink-0 w-16 text-sm font-medium text-white bg-green-500 rounded-l-md">
                <x-icon.folder-open class="flex-shrink-0 w-6 h-6 text-white" />
            </div>
            <div
                class="flex items-center justify-between flex-1 truncate bg-white border-t border-b border-r border-gray-200 rounded-r-md">
                <div class="flex-1 px-4 py-2 text-sm truncate">
                    <a href="#" class="font-medium text-gray-900 hover:text-gray-600">
                        Shared Documents
                    </a>
                    <p class="text-gray-500">{{ $shared_docs_count }} Records</p>
                </div>
                <div x-data="{openOptions:false}" @click.away="openOptions = false"
                    class="flex-shrink-0 pr-2">
                    <button type="button" x-on:click="openOptions = !openOptions"
                        class="inline-flex items-center justify-center w-8 h-8 text-gray-400 bg-white rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        <x-icon.dots-vertical class="w-5 h-5" />
                    </button>

                    <div x-show="openOptions" x-transition.duration.500ms
                        class="absolute z-10 w-48 mx-3 mt-1 origin-top-right bg-white divide-y divide-gray-200 rounded-md shadow-lg right-10 top-3 ring-1 ring-black ring-opacity-5 focus:outline-none"
                        style="display: none;">
                        <div class="py-1" role="none">
                            <a href="{{ route('office-documents',['user_id'=>Auth::user()->id]) }}" class="block px-4 py-2 text-sm text-gray-700">View</a>
                        </div>
                    </div>

                </div>
            </div>
        </li>

        <li class="relative flex col-span-1 rounded-md shadow-sm">
            <div
                class="flex items-center justify-center flex-shrink-0 w-16 text-sm font-medium text-white bg-teal-500 rounded-l-md">
                <x-icon.bell class="flex-shrink-0 w-6 h-6 text-white" />
            </div>
            <div
                class="flex items-center justify-between flex-1 truncate bg-white border-t border-b border-r border-gray-200 rounded-r-md">
                <div class="flex-1 px-4 py-2 text-sm truncate">
                    <a href="#" class="font-medium text-gray-900 hover:text-gray-600">
                        Notification
                    </a>
                    <p class="text-gray-500">0 Records</p>
                </div>
                <div x-data="{openOptions:false}" @click.away="openOptions = false"
                    class="flex-shrink-0 pr-2">
                    <button type="button" x-on:click="openOptions = !openOptions"
                        class="inline-flex items-center justify-center w-8 h-8 text-gray-400 bg-white rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                        <x-icon.dots-vertical class="w-5 h-5" />
                    </button>

                    <div x-show="openOptions" x-transition.duration.500ms
                        class="absolute z-10 w-48 mx-3 mt-1 origin-top-right bg-white divide-y divide-gray-200 rounded-md shadow-lg right-10 top-3 ring-1 ring-black ring-opacity-5 focus:outline-none"
                        style="display: none;">
                        <div class="py-1" role="none">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700">View</a>
                        </div>
                        <div class="py-1" role="none">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700">Removed from
                                pinned</a>
                        </div>
                    </div>

                </div>
            </div>
        </li>

    </ul>
</div>
