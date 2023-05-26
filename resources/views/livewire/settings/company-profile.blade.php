<div x-data="{disabled:true, finalize:false}" class="relative flex flex-col min-h-screen overflow-hidden bg-gray-50">
    <nav class="flex bg-blue-500 border-b border-gray-200" aria-label="Breadcrumb">
        <ol role="list" class="flex w-full max-w-screen-xl px-4 mx-auto space-x-4 sm:px-6 lg:px-8">
            <li class="flex">
                <div class="flex items-center">
                    <a href="{{ route('dashboard',['user_id'=>auth()->user()->id]) }}" class="text-white hover:font-semibold">
                        <!-- Heroicon name: solid/home -->
                        <x-icon.home class="flex-shrink-0 w-5 h-5" />
                        <span class="sr-only">Home</span>
                    </a>
                </div>
            </li>
            <li class="flex">
                <div class="flex items-center">
                    <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg"aria-hidden="true">
                        <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                    </svg>
                    <a href="#" class="ml-4 text-sm font-medium text-white hover:text-blue-200">
                        Settings
                    </a>
                </div>
            </li>
            <li class="flex">
                <div class="flex items-center">
                    <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg"aria-hidden="true">
                        <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                    </svg>
                    <a href="#" class="ml-4 text-sm font-medium text-white hover:text-blue-200">
                        Company Profile
                    </a>
                </div>
            </li>

        </ol>
    </nav>

    <div class="sm:h-8"></div>

    <div class="relative px-6 pt-4 pb-4 bg-white shadow-xl ring-1 ring-gray-900/5 sm:mx-auto sm:max-w-lg sm:rounded-lg sm:px-10 w-96">

        <div class="max-w-md mx-auto">
        <div class="divide-y divide-gray-300/50">
          <div class="space-y-4 text-base leading-7 text-gray-600">

            <div class="mt-4">
              <form wire:submit.prevent="save" enctype="multipart/form-data" class="grid grid-cols-1 font-medium gap-y-4 sm:grid-cols-2 sm:gap-x-8">

                <div class="space-y-1 sm:col-span-2">
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                      <div class="flex items-center">
                        <span class="w-12 h-12 overflow-hidden bg-gray-100 rounded-full">
                            @if ($logo)
                                <img class="w-full h-full rounded-full ring-4 ring-gray-500" src="{{ $logo }}" alt="user profile">
                            @else
                                <svg class="w-full h-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            @endif
                        </span>
                        <label for="logo-upload" class="relative px-2 py-1 ml-4 font-medium bg-white border border-gray-400 rounded-md cursor-pointer hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                            <span>Change logo</span>
                            <input wire:model.debounce.500="temp_logo" id="logo-upload" type="file" class="sr-only">
                        </label>
                      </div>
                    </div>
                </div>

                <div class="space-y-1 sm:col-span-2">
                    <label for="comapany_name" class="text-sm">Name: </label>
                    <x-input wire:model.lazy="name" id="comapany_name" type="text" placeholder="Enter company name"/>
                    @error('name')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                </div>

                <div class="space-y-1 sm:col-span-2">
                    <label for="cover-photo" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Background Image :
                        @if ($bg_image)
                        <label for="file-upload" class="relative font-medium text-blue-500 bg-white rounded-md cursor-pointer hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                            <span>Upload file</span>
                            <input wire:model.debounce.500="temp_bg_image" id="file-upload" type="file" class="sr-only">
                        </label>
                        @endif

                    </label>
                    @if ($bg_image)
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <div class="flex justify-center max-w-lg px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                <img class="w-20" src="{{ $bg_image }}" alt="Background image">
                            </div>
                        </div>
                    @else
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <div class="flex justify-center max-w-lg px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                <div class="space-y-1 text-center">
                                    <svg class="w-12 h-12 mx-auto text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                    <label for="file-upload" class="relative font-medium text-blue-500 bg-white rounded-md cursor-pointer hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span>Background Image :</span>
                                        <input wire:model.debounce.500="temp_bg_image" id="file-upload" type="file" class="sr-only">
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                </div>
                            </div>
                        </div>
                        @error('bg_image')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                    @endif
                </div>

                <div class="space-y-1 sm:col-span-2">
                    <label for="address" class="text-sm">Address :</label>
                    <div class="mt-1">
                        <textarea wire:model.lazy="address" rows="4" id="address" class="block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                    </div>
                    @error('address')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                </div>

                {{-- Save buttons --}}

                <div class="flex justify-end space-x-2 sm:col-span-2">
                    <div class="flex justify-end space-x-3">
                        <a href="{{ route('dashboard',['user_id',auth()->user()->id]) }}" class="px-3 py-1 bg-gray-300 rounded-md hover:bg-gray-500 hover:text-white">
                           Back
                        </a>
                        <x-button type="submit" class="text-white bg-blue-500 hover:bg-blue-600">
                            Save
                        </x-button>
                    </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
