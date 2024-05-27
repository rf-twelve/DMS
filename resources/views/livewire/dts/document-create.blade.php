<div class="bg-gray-100">
    {{-- <div class="px-4 py-16 mx-auto max-w-7xl sm:py-24 sm:px-6 lg:px-8"> --}}
    <div class="">
      <div class="relative bg-white shadow-xl">
        <h2 class="sr-only">Form</h2>

        <div class="grid grid-cols-1 lg:grid-cols-3">
          <!-- Contact information -->
          <div class="relative px-6 py-10 overflow-hidden bg-indigo-700 sm:px-10 xl:p-12">
            <div class="absolute inset-0 pointer-events-none sm:hidden" aria-hidden="true">
              <svg class="absolute inset-0 w-full h-full" width="343" height="388" viewBox="0 0 343 388" fill="none" preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg">
                <path d="M-99 461.107L608.107-246l707.103 707.107-707.103 707.103L-99 461.107z" fill="url(#linear1)" fill-opacity=".1" />
                <defs>
                  <linearGradient id="linear1" x1="254.553" y1="107.554" x2="961.66" y2="814.66" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#fff"></stop>
                    <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
                  </linearGradient>
                </defs>
              </svg>
            </div>
            <div class="absolute top-0 bottom-0 right-0 hidden w-1/2 pointer-events-none sm:block lg:hidden" aria-hidden="true">
              <svg class="absolute inset-0 w-full h-full" width="359" height="339" viewBox="0 0 359 339" fill="none" preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg">
                <path d="M-161 382.107L546.107-325l707.103 707.107-707.103 707.103L-161 382.107z" fill="url(#linear2)" fill-opacity=".1" />
                <defs>
                  <linearGradient id="linear2" x1="192.553" y1="28.553" x2="899.66" y2="735.66" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#fff"></stop>
                    <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
                  </linearGradient>
                </defs>
              </svg>
            </div>
            <div class="absolute top-0 bottom-0 right-0 hidden w-1/2 pointer-events-none lg:block" aria-hidden="true">
              <svg class="absolute inset-0 w-full h-full" width="160" height="678" viewBox="0 0 160 678" fill="none" preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg">
                <path d="M-161 679.107L546.107-28l707.103 707.107-707.103 707.103L-161 679.107z" fill="url(#linear3)" fill-opacity=".1" />
                <defs>
                  <linearGradient id="linear3" x1="192.553" y1="325.553" x2="899.66" y2="1032.66" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#fff"></stop>
                    <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
                  </linearGradient>
                </defs>
              </svg>
            </div>
            <h3 class="text-lg font-medium text-white">Document Monitoring Slip</h3>
            <p class="max-w-3xl mt-6 text-base text-indigo-50">
                A document monitoring slip is a form used to track the status of a
                document as it moves through a workflow. It can be used to track any
                type of document, such as a incoming letters, office order, report or other document.</p>
            <div class="mt-8 bg-gray-100 rounded-sm">
                <dl class="px-2 py-2">
                    <dd class="flex text-base">
                      <!-- Heroicon name: location -->
                      <x-icon.location class="flex-shrink-0 w-6 h-6"/>
                      <span class="ml-3 text-sm italic">Tracking Number :</span>
                      <span class="ml-3">{{ $tn }}</span>
                    </dd>

                    <dd class="flex text-base">
                      <!-- Heroicon name: clipboard-document-list -->
                      <x-icon.clipboard-document-list class="flex-shrink-0 w-6 h-6"/>
                      <span class="w-24 ml-3 text-sm italic whitespace-nowrap">Doc Type :</span>
                      <span class="flex w-full ml-3">
                        <select wire:model.lazy="class" class="w-full border rounded">
                            <option value="">** Select document type **</option>
                            @foreach (App\Models\Doc::Document_Classification as $value => $label)
                                <option value="{{ $value }}">{{ $label }}</option>
                            @endforeach
                        <select>
                      </span>
                    </dd>

                    <dd class="flex text-base">
                      <!-- Heroicon name: clipboard-document-list -->
                      <x-icon.clipboard-document-list class="flex-shrink-0 w-6 h-6"/>
                      <span class="w-24 ml-3 text-sm italic whitespace-nowrap">Doc For :</span>
                      <span class="flex w-full ml-3">
                        <select wire:model.lazy="for" class="w-full border rounded">
                            <option value="">** Select document for **</option>
                            @foreach (App\Models\Doc::Document_For as $value => $label)
                                <option value="{{ $value }}">{{ $label }}</option>
                            @endforeach
                        <select>
                      </span>
                    </dd>

                    <dd class="flex text-base">
                      <!-- Heroicon name: users -->
                      <x-icon.users class="flex-shrink-0 w-6 h-6"/>
                      <span class="w-24 ml-3 text-sm italic whitespace-nowrap">Refer to :</span>
                      <span class="flex w-full ml-3">
                        <select wire:model.lazy="refer_to" class="w-full border rounded">
                            <option value="">** Select refer to **</option>
                            <option value="0">Everyone</option>
                            @foreach ($refer_users as $value => $user)
                                <option value="{{ $user['id'] }}">{{ $user['fullname'] }}</option>
                            @endforeach
                        <select>
                      </span>
                    </dd>

                    <dd class="flex text-base">
                      <!-- Heroicon name: users -->
                      <x-icon.users class="flex-shrink-0 w-6 h-6"/>
                      <span class="w-24 ml-3 text-sm italic whitespace-nowrap">Save as :</span>
                      <span class="flex w-full ml-3">
                        <select wire:model.lazy="type" class="w-full border rounded">
                            <option value="">** Select save as **</option>
                            @foreach (App\Models\Doc::Document_Type as $value => $label)
                                <option value="{{ $value }}">{{ $label}}</option>
                            @endforeach
                        <select>
                      </span>
                    </dd>
                </dl>
            </div>
            <div class="mt-8">
                @if($errors->any())
                {{-- @error('class') --}}
                <dl class="p-2 space-y-1 bg-red-100 rounded">
                    @foreach ($errors->all() as $message)
                        <dd class="flex text-base">
                        <x-icon.exclamation-inside-triangle class="flex-shrink-0 w-6 h-6 text-red-500"/>
                        <x-comment class="text-red-500">*{{ $message }}</x-comment>
                        </dd>
                    @endforeach
                </dl>

                {{-- @enderror --}}
                @endif
            </div>

          </div>
          <!-- Contact form -->
          <div class="px-6 py-4 sm:px-10 lg:col-span-2 xl:p-12">
            <form wire:submit.prevent="save" enctype="multipart/form-data" class="grid grid-cols-1 gap-y-4 sm:grid-cols-2 sm:gap-x-8">
              <div>
                <label for="date_received" class="block text-sm font-medium text-gray-900">Date Received :</label>
                <div class="mt-1">
                  <input wire:model.lazy="date" type="date" id="date_received"
                  class="block w-full h-12 px-4 text-gray-900 border-2 border-indigo-500 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                  @error('date')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                </div>
              </div>
              <div>
                <label for="received_by" class="block text-sm font-medium text-gray-900">Received By :</label>
                <div class="mt-1">
                  <input wire:model.lazy="received_by" type="text" id="received_by"
                  class="block w-full h-12 px-4 text-gray-900 border-2 border-indigo-500 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                  @error('received_by')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                </div>
              </div>
              <div class="sm:col-span-2">
                <div class="flex justify-between">
                  <label for="origin" class="block text-sm font-medium text-gray-900">Origin of Document</label>
                  <span id="message-max" class="text-sm text-gray-500">Max. 500 characters</span>
                </div>
                <div class="mt-1">
                  <textarea wire:model.lazy="origin" id="origin" rows="4" class="block w-full px-4 py-2 text-gray-900 border-2 border-indigo-500 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" aria-describedby="message-max"></textarea>
                  @error('origin')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                </div>
              </div>
              <div class="sm:col-span-2">
                <div class="flex justify-between">
                  <label for="nature" class="block text-sm font-medium text-gray-900">Nature of Document</label>
                  <span id="message-max" class="text-sm text-gray-500">Max. 500 characters</span>
                </div>
                <div class="mt-1">
                  <textarea wire:model.lazy="nature" id="nature" rows="4" class="block w-full px-4 py-2 text-gray-900 border-2 border-indigo-500 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" aria-describedby="message-max"></textarea>
                  @error('nature')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                </div>
              </div>
              <div class="sm:col-span-2">
                <div class="flex justify-between">
                  <label for="remarks" class="block text-sm font-medium text-gray-900">Remarks</label>
                  <span id="message-max" class="text-sm text-gray-500">Max. 500 characters</span>
                </div>
                <div class="mt-1">
                  <textarea wire:model.lazy="remarks" id="message" rows="4" class="block w-full px-4 py-2 text-gray-900 border-2 border-indigo-500 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" aria-describedby="message-max"></textarea>
                  @error('remarks')<x-comment class="text-red-500">*{{ $message }}</x-comment>@enderror
                </div>
              </div>

              <div class="sm:col-span-2 sm:flex sm:justify-end">
                <button type="submit" class="inline-flex items-center justify-center w-full px-6 py-3 mt-2 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:w-auto">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
