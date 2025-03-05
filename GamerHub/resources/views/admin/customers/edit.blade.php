<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Customer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>Edit Customer</h1>

                    @if(session('success'))
                        <p class="text-green-500">{{ session('success') }}</p>
                    @endif

                    <form action="{{ route('admin.customers.update', $customer->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <label class="block">Name:</label>
                        <input type="text" name="name" value="{{ $customer->name }}" required class="block w-full border p-2"><br>

                        <label class="block">Email:</label>
                        <input type="email" name="email" value="{{ $customer->email }}" required class="block w-full border p-2"><br>

                        <button type="submit" class="manage-customers-btn bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Update
                        </button>
                    </form>

                    <a href="{{ route('admin.customers.index') }}" class="text-blue-500 mt-4 inline-block">Back to Customers</a>
                </div>
            </div>
        </div>
    </div>

    <style>
        .manage-customers-btn {
            background-color: #007bff; /* Default blue */
            color: white;
            transition: background-color 0.3s, box-shadow 0.3s;
            padding: 8px 16px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
        }

        .manage-customers-btn:hover {
            background-color: #0056b3; /* Darker blue on hover */
            box-shadow: 0 2px 10px rgba(0,0,0,0.2); /* Subtle shadow for depth */
        }
    </style>
</x-app-layout>
