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
                        User Profile
                    </a>
                </div>
            </li>

        </ol>
    </nav>

    <div class="sm:h-8"></div>

    <div class="relative px-6 bg-white shadow-xl sm:mt-8 w-96 ring-1 ring-gray-900/5 sm:mx-auto sm:max-w-lg sm:rounded-lg sm:px-10">

        <div class="max-w-md mx-auto">
        <div class="divide-y divide-gray-300/50">
          <div class="space-y-4 text-base leading-7 text-gray-600">

            <div class="py-4">
              <form wire:submit.prevent="save" enctype="multipart/form-data" class="grid grid-cols-1 font-medium gap-y-4 sm:grid-cols-2 sm:gap-x-8">

                <div class="space-y-1 sm:col-span-2">
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                      <div class="flex items-center">
                        <span class="w-12 h-12 overflow-hidden bg-gray-100 rounded-full">
                            @if ($avatar)
                                <img class="w-full h-full rounded-full ring-4 ring-gray-500" src="{{ $avatar }}" alt="user profile">
                            @else
                                <svg class="w-full h-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            @endif
                        </span>
                        <label for="logo-upload" class="relative px-2 py-1 ml-4 font-medium bg-white border border-gray-400 rounded-md cursor-pointer hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                            <span>Change photo</span>
                            <input wire:model.debounce.500="temp_avatar" id="logo-upload" type="file" class="sr-only">
                        </label>
                        @error('temp_avatar')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                      </div>
                    </div>
                </div>

                <div class="space-y-1 sm:col-span-2">
                    <label for="fullname" class="text-sm">Fullname: </label>
                    <x-input wire:model.debounce.500="fullname" id="fullname" type="text" placeholder="Enter complete name"/>
                    @error('fullname')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                </div>

                <div class="space-y-1 sm:col-span-2">
                    <label for="office" class="text-sm">
                        Office:
                        <p class="text-xs italic font-light">(Note: Please contact admin to modify this field.)</p>
                    </label>
                    <x-input wire:model.debounce.500="office" id="office" type="text" Disabled/>
                    @error('office')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                </div>
                <div class="space-y-1 sm:col-span-2">
                    <label for="username" class="text-sm">Username: </label>
                    <x-input wire:model.debounce.500="username" id="username" type="text" placeholder="Enter username"/>
                    @error('username')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                </div>
                <div class="space-y-1 sm:col-span-2">
                    <label for="password" class="text-sm">Password: </label>
                    <x-input wire:model.debounce.500="password" id="password" type="password" placeholder="Enter password"/>
                    @error('password')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                </div>
                <div class="space-y-1 sm:col-span-2">
                    <label for="email" class="text-sm">Email: </label>
                    <x-input wire:model.debounce.500="email" id="email" type="email" placeholder="Enter email"/>
                    @error('email')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
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
