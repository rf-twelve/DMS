<div class="min-h-screen bg-gray-100 ">

    <div class="flex flex-col">
        <main class="flex-1">

            <!-- Topbar Desktop -->
            <x-topbar-desktop>
                <li class="flex">
                    <div class="flex items-center">
                        <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg"aria-hidden="true">
                            <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                        </svg>
                        <a href="{{ route('dashboard',['user_id'=> auth()->user()->id]) }}" class="ml-4 text-sm font-medium text-white hover:text-blue-200">
                            Dashboard
                        </a>
                    </div>
                </li>
                <li class="flex">
                    <div class="flex items-center">
                        <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg"aria-hidden="true">
                            <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                        </svg>
                        <a href="#" class="ml-4 text-sm font-medium text-white hover:text-blue-200">
                            Pending Documents
                        </a>
                    </div>
                </li>
                <x-slot name="pending_notif">
                    {{ $pending_count }}
                </x-slot>
            </x-topbar-desktop>
            <div class="sm:flex">
                <div class="flex items-center flex-1 my-2">
                    <div class="w-full lg:max-w-xs">
                        <label for="search" class="sr-only">Search</label>
                        <div class="relative w-full pl-2 pr-2">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <x-icon.search class="w-5 h-5 text-gray-500" />
                            </div>
                            <x-input wire:model.debounce.500ms="filters.search" id="searchTerm"
                                class="block w-full py-2 pl-10 pr-3 leading-5 placeholder-gray-500 bg-white border border-gray-300 rounded-xl focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                placeholder="Search" placeholder="Type any keyword..." type="search" />
                        </div>
                    </div>
                </div>
                <div class="flex justify-between px-2 my-2 space-x-2">
                    <div>
                        <x-button wire:click="create"
                            class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-600 bg-white border border-transparent border-gray-300 shadow-sm hover:text-white w-max rounded-xl hover:bg-blue-500">
                            <x-icon.plus class="w-5 h-5" /> <span>Create</span>
                        </x-button>
                    </div>
                    <div class="flex justify-end space-x-1">
                        <div>
                            <x-select wire:model="perPage" id="perPage">
                                <option value="10">10 / page</option>
                                <option value="25">25 / page</option>
                                <option value="50">50 / page</option>
                                <option value="100">100 / page</option>
                            </x-select>
                        </div>
                        {{-- <div>
                            <x-dropdown class="rounded-xl" label="Action">
                                <x-dropdown.item class="rounded-xl" type="button" wire:click="$toggle('showDeleteSelectedRecordModal')"
                                    class="flex items-center space-x-2">
                                    <x-icon.trash class="text-cool-gray-400" /> <span>Verify</span>
                                </x-dropdown.item>
                                <x-dropdown.item class="rounded-xl" type="button" wire:click="$toggle('showDeleteSelectedRecordModal')"
                                    class="flex items-center space-x-2">
                                    <x-icon.trash class="text-cool-gray-400" /> <span>Ledger Entry</span>
                                </x-dropdown.item>
                                <x-dropdown.item class="rounded-xl" type="button" wire:click="$toggle('showDeleteSelectedRecordModal')"
                                    class="flex items-center space-x-2">
                                    <x-icon.trash class="text-cool-gray-400" /> <span>Delete</span>
                                </x-dropdown.item>
                            </x-dropdown>
                        </div>
                        <div>
                            <x-button wire:click="$toggle('showImportModal')"
                                class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-600 bg-white border border-transparent shadow-sm rounded-xl hover:bg-sky-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                                <x-icon.download class="w-5 h-5" /> <span>Import</span>
                            </x-button>
                        </div> --}}

                    </div>
                </div>
            </div>


            <div class="flex flex-col">
                <div class="min-w-full overflow-hidden overflow-x-scroll align-middle shadow">
                    <x-table>
                        <x-slot name="head">
                            <x-table.head class="px-2 py-1"></x-table.head>

                            <x-table.head class="px-2 py-1" sortable wire:click="sortBy('date')"
                                :direction="$sortField === 'date' ? $sortDirection : null">Date</x-table.head>

                            <x-table.head class="px-2 py-1" sortable wire:click="sortBy('tn')"
                                :direction="$sortField === 'tn' ? $sortDirection : null">Track Number</x-table.head>

                            <x-table.head class="px-2 py-1" sortable wire:click="sortBy('origin')"
                                :direction="$sortField === 'origin' ? $sortDirection : null">Origin</x-table.head>

                            <x-table.head class="px-2 py-1" sortable wire:click="sortBy('nature')"
                                :direction="$sortField === 'nature' ? $sortDirection : null">Nature</x-table.head>

                            <x-table.head class="px-2 py-1" sortable wire:click="sortBy('class')"
                                :direction="$sortField === 'class' ? $sortDirection : null">Class</x-table.head>

                            <x-table.head class="px-2 py-1" sortable wire:click="sortBy('type')"
                                :direction="$sortField === 'type' ? $sortDirection : null">Type</x-table.head>

                            {{-- <x-table.head class="px-2 py-1" sortable wire:click="sortBy('status')"
                                :direction="$sortField === 'status' ? $sortDirection : null">Status</x-table.head> --}}

                        </x-slot>

                        <x-slot name="body">
                            @if($selectPage)
                            <x-table.row class="bg-gray-300" wire:key="row-message">
                                <x-table.cell colspan="9" class="py-2">
                                    @unless ($selectAll)
                                    <div>
                                        <span>You have selected <strong>{{ $docs->count() }}</strong> records, do you
                                            want to select all <strong>{{ $docs->total() }}</strong>?</span>
                                        <x-button wire:click="selectAll" class="ml-1 text-blue-500">Select All
                                        </x-button>
                                    </div>
                                    @else
                                    <span>You have selected all <strong>{{ $docs->total() }}</strong> records.</span>
                                    @endIf
                                </x-table.cell>
                            </x-table.row>
                            @endif
                            @forelse ($docs as $item)
                            <x-table.row wire:loading.class.delay="opacity-50" wire:key="row-{{ $item->id }}" class="text-gray-600 hover:bg-blue-100">
                                <x-table.cell class="w-6 pl-2 pr-0">
                                    <div x-data="{ option_list: false }"  class="max-w-lg mx-auto">
                                        <a x-on:click="option_list = ! option_list" href="#"
                                            class="flex p-1 bg-gray-300 rounded-md">
                                            <x-icon.dots-vertical class="w-4 h-4" />
                                            <div :class="option_list ? 'rotate-90' : ''">
                                                <x-icon.chevron-right class="w-4 h-4" />
                                            </div>
                                        </a>
                                        <!-- Dropdown menu -->
                                        <div x-show="option_list" @click.away="option_list = false"
                                            class="absolute my-2 text-base list-none bg-gray-100 divide-y divide-gray-100 rounded shadow">
                                            <ul class="py-1">
                                                <li>
                                                    <a wire:click="toggleReceived('{{ $item->id }}')"  href="#"
                                                        class="flex items-center px-2 py-1 hover:bg-blue-500 hover:text-white">
                                                        <x-icon.circle-check class="w-5 h-5 mr-2" />
                                                        <span>Received</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </x-table.cell>
                                <x-table.cell>
                                    <span>{{ $item->document['date'] }}</span>
                                </x-table.cell>
                                <x-table.cell>
                                    <span>{{ $item->document['tn'] }}</span>
                                </x-table.cell>
                                <x-table.cell>
                                    <span>{{ Str::of($item->document['origin'])->limit(30) }}</span>
                                </x-table.cell>
                                <x-table.cell>
                                    <span>{{ Str::of($item->document['nature'])->limit(30) }}</span>
                                </x-table.cell>
                                <x-table.cell>
                                    <span>{{ $item->document->DocumentClass }}</span>
                                </x-table.cell>
                                <x-table.cell>
                                    <span>{{ $item->document->DocumentType }}</span>
                                </x-table.cell>
                                {{-- <x-table.cell>
                                    <span>{{ $item->status }}</span>
                                </x-table.cell> --}}
                            </x-table.row>
                            @empty
                            <x-table.row wire:loading.class.delay="opacity-50">
                                <x-table.cell colspan="10">
                                    <div class="flex items-center justify-center">
                                       <x-icon.box-empty class="w-8 h-8 text-slate-400" />
                                        <span class="px-2 py-8 text-xl font-medium text-slate-400">No Records
                                            found...</span>
                                    </div>
                                </x-table.cell>
                            </x-table.row>
                            @endforelse
                            <x-table.row class="bg-gray-300" wire:key="row-message">
                                <x-table.cell colspan="10" class="">
                                    {{ $docs->links('vendor.livewire.modified-tailwind') }}
                                </x-table.cell>
                            </x-table.row>
                        </x-slot>
                    </x-table>

                    <!-- Pagination -->

                </div>
            </div>
        </div>

        <div>
            <form wire:submit.prevent="importFile">
                <x-modal.dialog wire:model.defer="showImportModal">
                    <x-slot name="title">Import Data</x-slot>

                    <x-slot name="content">
                        {{-- <x-input.fileupload :error="$errors->first('imports.file')"
                            helpText="Excell or Csv file up to 10MB.">
                            <x-slot name="inputIcon">
                                <x-icon.upload class="w-12 h-12 mx-auto text-gray-400" />
                            </x-slot>
                            <x-slot name="inputLabel">
                                <x-input.file-label label="Upload a file" for="file_upload">
                                    <x-input.file wire:model="imports.file" class="sr-only" id="file_upload" />
                                </x-input.file-label>
                            </x-slot>
                        </x-input.fileupload> --}}
                    </x-slot>
                    <x-slot name="footer">
                        <x-button wire:click="$set('showImportModal', false)">Cancel</x-button>
                        <x-button type="submit">Import</x-button>
                    </x-slot>
                </x-modal.dialog>
            </form>
        </div>

        <!-- Delete Single Record Modal -->
        <div>
            <form wire:submit.prevent="deleteSingleRecord">
                <x-modal.confirmation wire:model.defer="showDeleteSingleRecordModal" selectedIcon="delete">
                    <x-slot name="title">Delete Record</x-slot>

                    <x-slot name="content">
                        <div class="py-8 text-gray-700">Are you sure you? This action is irreversible.</div>
                    </x-slot>

                    <x-slot name="footer">
                        <x-button type="button" wire:click="$set('showDeleteSingleRecordModal', false)">Cancel</x-button>

                        <x-button type="submit">Delete</x-button>
                    </x-slot>
                </x-modal.confirmation>
            </form>
        </div>

        <!-- Delete Single Record Modal -->
        <div>
            <form wire:submit.prevent="deleteSelectedRecord">
                <x-modal.confirmation wire:model.defer="showDeleteSelectedRecordModal" selectedIcon="delete">
                    <x-slot name="title">Delete Selected Record</x-slot>

                    <x-slot name="content">
                        <div class="py-8 text-gray-700">Are you sure you? This action is irreversible.</div>
                    </x-slot>

                    <x-slot name="footer">
                        <x-button type="button" wire:click.prevent="$set('showDeleteSelectedRecordModal', false)">Cancel</x-button>

                        <x-button type="submit">Delete</x-button>
                    </x-slot>
                </x-modal.confirmation>
            </form>
        </div>


        </main>
    </div>
</div>
