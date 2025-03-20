<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-bold mb-4">Edit Product</h3>

                    <form action="{{ route('admin.inventory.update', $product->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium">Product Name:</label>
                            <input type="text" id="name" name="name" value="{{ $product->name }}"
                                   class="w-full p-2 border rounded">
                        </div>

                        <div class="mb-4">
                            <label for="price" class="block text-sm font-medium">Price:</label>
                            <input type="number" id="price" name="price" value="{{ $product->price }}" step="0.01"
                                   class="w-full p-2 border rounded">
                        </div>

                        <div class="mb-4">
                            <label for="stock" class="block text-sm font-medium">Stock:</label>
                            <input type="number" id="stock" name="stock" value="{{ $product->stock }}" min="0"
                                   class="w-full p-2 border rounded">
                        </div>

                        <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Update Product
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
