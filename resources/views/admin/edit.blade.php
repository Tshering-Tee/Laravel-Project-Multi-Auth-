<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Success Message -->
                    @if (session('success'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.dashboard.update', $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Name Field -->
                        <div class="mb-4">
                            <label for="name" class="block font-medium text-sm text-gray-700">{{ __('Name') }}</label>
                            <input id="name" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="name" value="{{ old('name', $user->name) }}" required autofocus />
                        </div>

                        <!-- Email Field -->
                        <div class="mb-4">
                            <label for="email" class="block font-medium text-sm text-gray-700">{{ __('Email') }}</label>
                            <input id="email" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="email" name="email" value="{{ old('email', $user->email) }}" required />
                        </div>

                        <!-- Role Field -->
                        <div class="mb-4">
                            <label for="role" class="block font-medium text-sm text-gray-700">{{ __('Role') }}</label>
                            <select id="role" name="role" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                <option value="guest" {{ $user->role == 'guest' ? 'selected' : '' }}>Guest</option>
                            </select>
                        </div>

                        <!-- Current Image -->
                        @if($user->image)
                            <div class="mb-4">
                                <label class="block font-medium text-sm text-gray-700">{{ __('Current Image') }}</label>
                                <img src="{{ asset('storage/' . $user->image) }}" alt="User Image" class="w-32 h-32 object-cover rounded-full">
                            </div>
                        @endif

                        <!-- Image Upload Field -->
                        <div class="mb-4">
                            <label for="image" class="block font-medium text-sm text-gray-700">{{ __('Image') }}</label>
                            <input id="image" type="file" name="image" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                        </div>

                        <!-- Update Button -->
                        <div class="flex items-center justify-end">
                            <button type="submit" class="ml-4 inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-800 disabled:opacity-25 transition">
                                {{ __('Update User') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
