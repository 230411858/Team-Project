<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Customers') }}
        </h2>
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>Customer List</h1>
                    
                    @if(session('success'))
                        <p class="text-green-500">{{ session('success') }}</p>
                    @endif

                    <table class="w-full">
                        <tr class="border-b">
                            <th class="p-2">Name</th>
                            <th class="p-2">Email</th>
                            <th class="p-2">Actions</th>
                        </tr>
                        @foreach($customers as $customer)
                            <tr>
                                <td class="p-2">{{ $customer->name }}</td>
                                <td class="p-2">{{ $customer->email }}</td>
                                <td class="p-2">
                                    <a href="{{ route('admin.customers.edit', $customer->id) }}" class="text-blue-500">Edit</a> |
                                    <form action="{{ route('admin.customers.destroy', $customer->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')" class="text-red-500">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
