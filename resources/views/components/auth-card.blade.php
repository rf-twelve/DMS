{{-- Sample Logo: https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg --}}
<div class="flex min-h-screen bg-white">
    <div class="flex flex-col justify-center flex-1 px-4 py-12 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
        <div class="w-full max-w-sm mx-auto lg:w-96">
            <div class="text-center">
                <div class="inline-block max-w-[160px] mx-auto">
                    <img class="w-auto h-12 mx-auto" src="{{ $company->logoUrl() }}" alt="Company Logo" />
                    {{-- <img class="w-16 h-16" src="{{ asset(env('APP_LOGO')) }}" alt="Company Logo"> --}}
                </div>
            </div>
            <div class="mb-10 text-center">
                <div class="inline-block max-w-[300px] mx-auto">
                    <span class="font-sans text-2xl font-bold">{{ $company->system }}</span><br>
                    <span class="font-serif text-xl text-justify">
                        {{ $company->name }}
                    </span>
                </div>
            </div>
            <div class="mt-4">
                {{ $slot }}

                <div class="flex items-center justify-center py-2">
                    {{-- <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500"> already </a> --}}
                    <span class="font-thin hover:text-blue-800 text-slate-800">
                        {{ $company->developer }}
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="relative flex-1 hidden w-0 lg:block">
        <img class="absolute inset-0 object-cover w-full h-full"
        src="{{ $company->bgUrl() }}" alt="Company office" />
    </div>
</div>
