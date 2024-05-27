<ul role="list" class="grid grid-cols-1 gap-6 p-8 sm:grid-cols-2 lg:grid-cols-3">

    <li class="col-span-1 bg-white divide-y divide-gray-200 rounded-lg shadow">
        <div class="flex items-center justify-between w-full p-6 space-x-6">
            <div class="flex-1 truncate">
                <div class="flex items-center space-x-3">
                    <h2 class="text-sm font-medium text-gray-900 truncate">TRACK DOCUMENTS</h2>
                </div>
                <p class="mt-1 text-sm text-gray-500">Trace the location of document.</p>
            </div>
            <img src="{{ asset('\img\dts\dms_2.jpg') }}"
                class="flex-shrink-0 w-10 h-10 bg-gray-300 rounded-full" alt="Image">
        </div>
        <div class="p-2">
            <div class="flex mt-1 rounded-md shadow-sm">
                <div class="relative flex items-stretch flex-grow focus-within:z-10">
                    <x-form.input-text type="search" placeholder="Enter Tracking Number" class="pl-2 border rounded-none rounded-l-md"/>
                </div>
                <x-form.button class="relative inline-flex items-center -ml-px space-x-2 border-gray-300 rounded-none rounded-r-md bg-gray-50 hover:bg-gray-100">
                    <x-icon.location class="w-6 h-6" /><span>Track</span>
                </x-form.button>
            </div>
        </div>
    </li>

    <li class="col-span-1 bg-white divide-y divide-gray-200 rounded-lg shadow">
        <div class="flex items-center justify-between w-full p-6 space-x-6">
            <div class="flex-1 truncate">
                <div class="flex items-center space-x-3">
                    <h2 class="text-sm font-medium text-gray-900 truncate">RECEIVE DOCUMENT</h2>
                </div>
                <p class="mt-1 text-sm text-gray-500">Notify that a document was received.</p>
            </div>
            <img src="{{ asset('\img\dts\dms_received_docs.jpg') }}"
                class="flex-shrink-0 w-10 h-10 bg-gray-300 rounded-full" alt="Image">
        </div>
        <div>
            <div class="flex p-2 mt-1 rounded-md shadow-sm">
                <div class="relative flex items-stretch flex-grow focus-within:z-10">
                    <x-form.input-text wire:model.debounce.500='tn_received' type="search" placeholder="Enter Tracking Number" class="pl-2 border rounded-none rounded-l-md"/>
                </div>
                <x-form.button wire:click='receivedDocument()' class="relative inline-flex items-center -ml-px space-x-2 border-gray-300 rounded-none rounded-r-md bg-gray-50 hover:bg-gray-100">
                    <x-icon.arrow-down-on-square class="w-6 h-6" /><span>Receive</span>
                </x-form.button>
            </div>
        </div>
    </li>

    <li class="col-span-1 bg-white divide-y divide-gray-200 rounded-lg shadow">
        <div class="flex items-center justify-between w-full p-6 space-x-6">
            <div class="flex-1 truncate">
                <div class="flex items-center space-x-3">
                    <h2 class="text-sm font-medium text-gray-900 truncate">RELEASE DOCUMENT</h2>
                </div>
                <p class="mt-1 text-sm text-gray-500">Notify that a document was released.</p>
            </div>
            <img class="flex-shrink-0 w-10 h-10 bg-gray-300 rounded-full"
                src="{{ asset('\img\dts\dms_release_docs.jpg') }}" alt="Received image">
        </div>
        <div>
            <div class="flex p-2 mt-1 rounded-md shadow-sm">
                <div class="relative flex items-stretch flex-grow focus-within:z-10">
                    <x-form.input-text wire:model.debounce.500='tn_released' type="search" placeholder="Enter Tracking Number" class="pl-2 border rounded-none rounded-l-md"/>
                </div>
                <x-form.button wire:click="releaseDocument()" class="relative inline-flex items-center -ml-px space-x-2 border-gray-300 rounded-none rounded-r-md bg-gray-50 hover:bg-gray-100">
                    <x-icon.arrow-up-on-square class="w-6 h-6" /><span>Release</span>
                </x-form.button>
            </div>
        </div>
    </li>

    <li class="col-span-1 bg-white divide-y divide-gray-200 rounded-lg shadow">
        <div class="flex items-center justify-between w-full p-6 space-x-6">
            <div class="flex-1 truncate">
                <div class="flex items-center space-x-3">
                    <h2 class="text-sm font-medium text-gray-900 truncate">DOCUMENT TERMINAL</h2>
                </div>
                <p class="mt-1 text-sm text-gray-500">Notify that a paper trail was terminal.</p>
            </div>
            <img class="flex-shrink-0 w-10 h-10 bg-gray-300 rounded-full"
                src="{{ asset('\img\dts\dms_terminal.jpg') }}" alt="Received image">
        </div>
        <div>
            <div class="flex p-2 mt-1 rounded-md shadow-sm">
                <div class="relative flex items-stretch flex-grow focus-within:z-10">
                    <x-form.input-text type="search" placeholder="Enter Tracking Number" class="pl-2 border rounded-none rounded-l-md"/>
                </div>
                <x-form.button class="relative inline-flex items-center -ml-px space-x-2 border-gray-300 rounded-none rounded-r-md bg-gray-50 hover:bg-gray-100">
                    <x-icon.terminal class="w-6 h-6" /><span>Terminal</span>
                </x-form.button>
            </div>
        </div>
    </li>

    <li class="col-span-1 bg-white divide-y divide-gray-200 rounded-lg shadow">
        <div class="flex items-center justify-between w-full p-6 space-x-6">
            <div class="flex-1 truncate">
                <div class="flex items-center space-x-3">
                    <h2 class="text-sm font-medium text-gray-900 truncate">CREATE DOCUMENT</h2>
                </div>
                <p class="mt-1 text-sm text-gray-500">Creation of a new document.</p>
            </div>
            <img class="flex-shrink-0 w-10 h-10 bg-gray-300 rounded-full"
                src="{{ asset('\img\dts\dms_create.jpg') }}" alt="Received image">
        </div>
        <div>
            <div class="flex p-2 mt-1 rounded-md shadow-sm">
                <div class="relative flex items-stretch flex-grow focus-within:z-10">
                    <x-form.input-text type="text" placeholder="Auto-generate Tracking Number" class="pl-2 border rounded-none rounded-l-md" disabled/>
                </div>
                <x-form.button wire:click='create' class="relative inline-flex items-center -ml-px space-x-2 border-gray-300 rounded-none rounded-r-md bg-gray-50 hover:bg-gray-100">
                    <x-icon.folder-plus class="w-6 h-6" /><span>Create</span>
                </x-form.button>
            </div>
        </div>
    </li>

    <!-- Add more... -->
</ul>
