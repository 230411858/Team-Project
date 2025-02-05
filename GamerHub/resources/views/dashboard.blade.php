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
                    {{ __("You're logged in!") }}<br>
                    @if (Illuminate\Support\Facades\Auth::user()->account_type == 'admin')

                    List of currently registered users:
                    <br>
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Account Type</th>
                        </tr>
                        @foreach (\App\Models\User::all() as $user) 
                        <tr>
                            <td>{{ ucfirst($user->name) }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ ucfirst($user->account_type) }}</td>
                        </tr>
                        @endforeach
                    </table>
                    <br>
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Product name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Stock</th>
                        </tr>
                        @foreach (\App\Models\Product::all() as $product) 
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ ucfirst($product->name) }}</td>
                            <td>{{ ucfirst($product->category) }}</td>
                            <td>£{{ number_format($product->price / 100, 2) }}</td>
                            <td>{{ $product->stock }}</td>
                        </tr>
                        @endforeach
                    </table>
                    @endif
            </div>
        </div>
    </div>
</x-app-layout>
