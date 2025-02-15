<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">All Users</h3>
                    
                    <div class="mt-8 flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    #SL
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Profile Image
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    User ID
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Full Name
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Email Address
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    User Role
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Account Created
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Actions
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach ($users as $index => $user)
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        @if($user->image)
                                                            <img src="{{ asset('storage/' . $user->image) }}" alt="User Image" class="w-16 h-16 object-cover rounded-full cursor-pointer">
                                                        @else
                                                            <div class="w-16 h-16 flex items-center justify-center bg-blue-800 text-white rounded-full cursor-pointer">
                                                                {{ strtoupper(substr($user->name, 0, 1)) }}
                                                            </div>
                                                        @endif
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                        {{ $user->id }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{ $user->name }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{ $user->email }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{ $user->role }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{ $user->created_at->format('Y-m-d H:i:s') }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                        <div class="flex space-x-4 justify-end items-center">
                                                            <!-- Edit Button -->
                                                            <a href="{{ route('admin.dashboard.edit', $user->id) }}" class="inline-flex items-center px-4 py-2 text-indigo-600 hover:text-indigo-900 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 active:text-indigo-800 transition">
                                                                Edit
                                                            </a>
                                                            <!-- Delete Button -->
                                                            <form method="POST" action="{{ route('admin.dashboard.destroy', $user->id) }}" onsubmit="return confirm('Are you sure you want to delete this user?');" class="inline">
                                                                @csrf
                                                                @method('DELETE')

                                                                <button type="submit" class="inline-flex items-center px-4 py-2 text-red-500 hover:text-red-700 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:text-red-800 transition">
                                                                    Delete
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
