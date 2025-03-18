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
                        <h3>List of currently registered customers:</h3>
                        <table>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                            @foreach (\App\Models\User::where('account_type', 'customer')->get() as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <a href="{{ route('admin.customers.edit', $user->id) }}" class="text-blue-500">Edit</a> |
                                        <form action="{{ route('admin.customers.destroy', $user->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure?')" class="text-red-500">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @endif
</div>
<div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3>My orders:</h3>
                        <table>
                            <tr>
                                <th>Order ID</th>
                                <th>Order Date</th>
                                <th>Email</th>
                                <th>Status</th>
                            </tr>
                            @foreach (\App\Models\Order::where('user', Auth::id())->get() as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ substr( $order->created_at, 0, 10) }}</td>
                                    <td>{{ $order->email }}</td>
                                    <td>{{ $order->status }}</td>
                                    <td>
                                        <a href="{{ url('/orders') }}/{{ $order->id }}" class="text-blue-500">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
</div>
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
