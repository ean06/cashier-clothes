<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex items-center">
                        <!-- Icon welcoming the user -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mr-4 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14m7-7H5"></path>
                        </svg>
                        <span class="text-xl font-semibold">{{ __("Welcome back,") }} {{ Auth::user()->name }}!</span>
                    </div>
                    <p class="mt-2 text-lg text-gray-600">
                        {{ __("You're successfully logged in and ready to go!") }}
                    </p>
                    <div class="mt-4">
                        <a href="{{ route('profile.show') }}" class="text-blue-500 hover:underline">
                            {{ __("Go to your profile") }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
