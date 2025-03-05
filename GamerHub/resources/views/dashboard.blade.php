<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in! ") }}<br>

                    @if (Illuminate\Support\Facades\Auth::user()->account_type == 'admin')
                        <div class="mt-6">
                            {{-- Manage Customers Button --}}
                            <a href="{{ route('admin.customers.index') }}" class="manage-customers-btn bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Manage Customers
                            </a>
                        </div>
                    @endif
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
