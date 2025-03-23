<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Product') }}
        </h2>
    </x-slot>

    <div class="content-section">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h3 class="section-title">Add New Product</h3>

                    {{-- Success Message --}}
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Error Messages --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Product Form --}}
                    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="name">Product Name:</label>
                            <input type="text" id="name" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="price">Price (£):</label>
                            <input type="number" id="price" name="price" step="0.01" required>
                        </div>

                        <div class="form-group">
                            <label for="stock">Stock Quantity:</label>
                            <input type="number" id="stock" name="stock" required>
                        </div>

                        {{-- Category Selection --}}
                        <div class="form-group">
                            <label for="category">Category:</label>
                            <select id="category" name="category" required>
                                <option value="" disabled selected>Select Category</option>
                                <option value="mice">Mice</option>
                                <option value="keyboards">Keyboards</option>
                                <option value="monitors">Monitors</option>
                                <option value="audio">Audio</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea id="description" name="description" rows="2" required></textarea>
                        </div>



{{--                         Images --}}
{{--                        <div class="form-group">--}}
{{--                            <label for="images">Upload Product Images:</label>--}}
{{--                            <input type="file" id="images" name="images[]" accept="image/*" multiple>--}}
{{--                        </div>--}}

                        <button type="submit" class="action-button">Save Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .content-section {
            padding: 40px 0;
        }

        .container {
            max-width: 800px;
            margin: auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .card-body {
            padding: 20px;
        }

        .section-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input, textarea, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .action-button {
            background-color: #007bff;
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s, box-shadow 0.3s;
            border: none;
            cursor: pointer;
        }

        .action-button:hover {
            background-color: #0056b3;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }

        .alert {
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            font-weight: bold;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-left: 5px solid #28a745;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border-left: 5px solid #dc3545;
        }
    </style>
</x-app-layout>
