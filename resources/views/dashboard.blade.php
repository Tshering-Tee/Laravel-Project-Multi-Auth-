<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-3xl font-bold text-white leading-tight">
                {{ __('User Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-200">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="rounded p-6">
                <div class="flex flex-col items-center space-y-6">
                    <div class="flex-shrink-0">
                        <img src="/images/logo.png" alt="" width="100px">
                    </div>
                    <div class="text-center">
                        <h3 class="text-2xl font-semibold text-gray-800">{{ $user->name }}</h3>
                        <p class="text-lg text-gray-600">{{ $user->email }}</p>
                    </div>
                </div>

                <div class="mt-6 text-center">
                    <p class="text-gray-700">
                        {{ __("Welcome back, $user->name! Ready to conquer the day?") }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
