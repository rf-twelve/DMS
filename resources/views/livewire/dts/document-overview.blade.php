<div class="min-h-full">
    <div class="flex flex-col min-h-0">
        <!-- Top nav-->
        <x-header.navbar>
            <!-- This example requires Tailwind CSS v2.0+ -->
            <nav class="flex" aria-label="Breadcrumb">
                <ol role="list" class="flex items-center space-x-4">
                <li>
                    <div>
                    <a href="{{ route('dashboard',['user_id'=>Auth::user()->id]) }}" class="hover:text-blue-100">
                        <x-icon.home class="flex-shrink-0 w-5 h-5"/>
                        <span class="sr-only">Home</span>
                    </a>
                    </div>
                </li>

                <li>
                    <div class="flex items-center">
                    <x-icon.chevron-right class="flex-shrink-0 w-5 h-5"/>
                    <a href="{{ url()->previous() }}" class="ml-4 text-sm font-medium hover:text-blue-100" aria-current="page">Documents</a>
                    </div>
                </li>

                <li>
                    <div class="flex items-center">
                    <x-icon.chevron-right class="flex-shrink-0 w-5 h-5"/>
                    <a href="#" class="ml-4 text-sm font-medium hover:text-blue-100" aria-current="page">View</a>
                    </div>
                </li>
                </ol>
            </nav>

        </x-header.navbar>

        <!-- Bottom section -->
        <div class="flex-1 min-h-0 overflow-hidden">
            <!-- Main area -->
            <main class="flex-1 min-w-0 border-t border-gray-200 xl:flex">

                <div class="order-first xl:block xl:flex-shrink-0">
                    <div class="relative flex flex-col h-full bg-gray-100 border-r border-gray-200 w-96">
                        <div class="flex-shrink-0">
                            <div class="flex justify-between px-6 py-2 text-sm font-medium text-gray-700 bg-blue-300 border-t border-b border-gray-200">
                                <div class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                    </svg>
                                    <span class="pl-2">DOCUMENT INFO</span>
                                    @if ($author_id == auth()->user()->id)
                                        <a href="{{ route('edit-document',['user_id'=>auth()->user()->id, 'id'=> $doc_id]) }}" class="flex ml-3 text-indigo-600 hover:text-indigo-900">
                                            <x-icon.edit class="w-4 h-4" /><span class="text-xs">Edit</span>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <nav class="flex-1 min-h-0 overflow-y-auto">
                            <section aria-labelledby="timeline-title" class="lg:col-start-3 lg:col-span-1">
                                    <!-- ACCOUNT DETAILS -->
                                <div class="px-2 border-t border-gray-200 text-md sm:p-0">
                                    <dl class="sm:divide-y sm:divide-gray-200">
                                        <div class="py-2 sm:py-1 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6">
                                            <dt class="font-medium text-gray-500">
                                                TRACK #:</dt>
                                            <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{ $tn }}
                                            </dd>
                                        </div>
                                        <div class="py-2 sm:py-1 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6">
                                            <dt class="font-medium text-gray-500">
                                                DATE :</dt>
                                            <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{ $date }}
                                            </dd>
                                        </div>
                                        <div class="py-2 sm:py-1 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6">
                                            <dt class="font-medium text-gray-500">
                                                RECEIVED BY :</dt>
                                            <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{ $received_by }}
                                            </dd>
                                        </div>
                                        <div class="py-2 sm:py-1 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6">
                                            <dt class="font-medium text-gray-500">
                                                ORIGIN :</dt>
                                            <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{ $origin }}
                                            </dd>
                                        </div>
                                        <div class="py-2 sm:py-1 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6">
                                            <dt class="font-medium text-gray-500">
                                                NATURE :</dt>
                                            <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{ $nature }}
                                            </dd>
                                        </div>
                                        <div class="py-2 sm:py-1 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6">
                                            <dt class="font-medium text-gray-500">
                                                CLASS :</dt>
                                            <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{ $class_name }}
                                            </dd>
                                        </div>
                                        <div class="py-2 sm:py-1 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6">
                                            <dt class="font-medium text-gray-500">
                                                FOR :</dt>
                                            <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{ $for_name }}
                                            </dd>
                                        </div>
                                        <div class="py-2 sm:py-1 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6">
                                            <dt class="font-medium text-gray-500">
                                                REMARKS :</dt>
                                            <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{ $remarks }}
                                            </dd>
                                        </div>
                                        <div class="py-2 sm:py-1 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6">
                                            <dt class="font-medium text-gray-500">
                                                AUTHOR :</dt>
                                            <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{ $author_fullname }}
                                            </dd>
                                        </div>
                                        {{-- <div class="py-2 sm:py-1 sm:grid sm:grid-cols-3 sm:gap-2 sm:px-6">
                                            <dt class="font-medium text-gray-500">
                                                UPDATED BY :</dt>
                                            <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                                                {{ $updated_by }}
                                            </dd>
                                        </div> --}}
                                    </dl>
                                </div>
                            </section>
                        </nav>
                    </div>
                </div>

                <section aria-labelledby="message-heading" class="flex flex-col flex-1 h-full min-w-0 overflow-hidden xl:order-last">

                    <!-- RIGTH SIDE SPACE -->
                    <div class="flex-1 overflow-y-auto lg:block">
                        <div class="min-h-screen pb-6 bg-white shadow">
                            <div class="sm:items-baseline sm:justify-between">

                                {{-- PAPER TRAIL TABLE --}}
                                {{--ACTION TAKEN--}}
                                <div class="flex justify-between px-6 py-2 text-sm font-medium text-gray-700 bg-blue-300 border-t border-b border-gray-200">
                                    <div class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                        </svg>
                                        <span class="pl-2">ACTION TAKEN</span>
                                    </div>
                                </div>

                                <div class="flex flex-col">
                                    <div class="min-w-full overflow-hidden overflow-x-scroll align-middle shadow">
                                        <x-table>
                                            <x-slot name="head">
                                                <thead class="px-3 text-sm text-center text-gray-900 bg-gray-300 border border-gray-50">
                                                    <tr class="font-semibold">
                                                        {{-- <th class="text-center border">DATE/TIME</th> --}}
                                                        <th class="text-center border">OFFICE</th>
                                                        <th class="text-center border">FROM</th>
                                                        <th class="text-center border">REFER TO</th>
                                                        <th class="text-center border">ACTION</th>
                                                        <th class="text-center border">REMARKS</th>
                                                        <th class="text-center border">STATUS</th>
                                                    </tr>
                                                </thead>
                                            </x-slot>

                                            <x-slot name="body">
                                                @forelse ($doc_actions as $key => $action)
                                                    <tr class="px-3 py-2 text-gray-500 border whitespace-nowrap">
                                                        <td class="px-3 py-2 border">{{ $action->OfficeName }}</td>
                                                        <td class="px-3 py-2 border">{{ $action->ReferFromFullname }}</td>
                                                        <td class="px-3 py-2 border">{{ $action->ReferToFullname }}</td>
                                                        <td class="px-3 py-2 border">{{ $action['action_taken'] }}</td>
                                                        <td class="px-3 py-2 border">{{ $action['remarks'] }}</td>
                                                        <td class="px-3 py-2 italic border">{{ $action->DocumentStatus }}</td>
                                                    </tr>
                                                @empty
                                                @endforelse
                                            </x-slot>
                                        </x-table>
                                    </div>
                                </div>

                                {{--Audit Trail--}}
                                <div class="flex justify-between px-6 py-2 text-sm font-medium text-gray-700 bg-blue-300 border-t border-b border-gray-200">
                                    <div class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                        </svg>
                                        <span class="pl-2">DOCUMENT TRACKING</span>
                                    </div>
                                </div>

                                <div class="flex flex-col">
                                    <div class="min-w-full overflow-hidden overflow-x-scroll align-middle shadow">
                                        <x-table>
                                            <x-slot name="head">
                                                <thead class="px-3 text-sm text-center text-gray-900 bg-gray-300 border border-gray-50">
                                                    <tr class="font-semibold">
                                                        <th class="w-12 text-center border">DATE</th>
                                                        <th class="w-12 text-center border">TIME</th>
                                                        <th class="pl-3 text-left border">DETAILS</th>
                                                    </tr>
                                                </thead>
                                            </x-slot>

                                            <x-slot name="body">
                                                @forelse ($doc_tracks as $key => $track)
                                                    <tr class="px-3 py-2 text-gray-500 border whitespace-nowrap">
                                                        <td class="px-3 py-2 border">{{ $track['date'] }}</td>
                                                        <td class="px-3 py-2 border">{{ $track['time'] }}</td>
                                                        <td class="px-3 py-2 border">{{ $track['details'] }}</td>
                                                    </tr>
                                                @empty
                                                @endforelse
                                            </x-slot>
                                        </x-table>
                                    </div>
                                </div>


                                {{--ATTACHED FILES--}}
                                <div class="flex justify-between px-6 py-2 mt-6 text-sm font-medium text-gray-700 bg-blue-300 border-t border-b border-gray-200">
                                    <div class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                        </svg>
                                        <span class="pl-2">ATTACHED FILE(s)</span>
                                    </div>
                                </div>

                                <div class="flex flex-col">
                                    <div class="min-w-full overflow-hidden overflow-x-scroll align-middle shadow">
                                        @forelse ($images as $image)
                                        <img src="{{ $image->imageUrl() }}" alt="Photo">
                                        @empty
                                        @endforelse
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </section>


            </main>
        </div>
    </div>
</div>
