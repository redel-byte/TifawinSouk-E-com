<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Inventory Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
        }

        .form-container {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .input-focus:focus {
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        }

        .header-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .btn-submit {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s ease;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }
    </style>
</head>

<body class="bg-gray-50">
    <div class="container mx-auto px-4 py-8 max-w-5xl">
        <div class="mb-10 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-3">Product Inventory Management</h1>
            <p class="text-gray-600 max-w-2xl mx-auto">Manage your product catalog with this comprehensive form. Track references, descriptions, pricing, and stock levels.</p>
        </div>

        <div class="form-container bg-white rounded-xl overflow-hidden">
            <!-- Header -->
            <div class="header-gradient text-white p-6">
                <div class="flex flex-col md:flex-row md:items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold">Product Entry Form</h2>
                        <p class="text-blue-100 mt-1">Fill in the details below to add or update a product</p>
                    </div>
                    <div class="mt-4 md:mt-0">
                        <span class="inline-block bg-blue-800 text-white px-4 py-2 rounded-lg font-medium">
                            <i class="fas fa-box-open mr-2"></i> Inventory System
                        </span>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <form id="productForm" class="p-6 md:p-8" method="POST" action="{{ route('products.store') }}">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <!-- Product Name -->
                    <div>
                        <label for="product" class="block text-gray-700 font-medium mb-2">
                            <i class="fas fa-cube mr-2 text-blue-500"></i>Product Name *
                        </label>
                        <div class="relative">
                            <input type="text" id="product" name="product" required
                                class="w-full px-4 py-3 pl-10 border border-gray-300 rounded-lg input-focus focus:outline-none focus:border-blue-500"
                                placeholder="Enter product name">
                            <div class="absolute left-3 top-3.5 text-gray-400">
                                <i class="fas fa-box"></i>
                            </div>
                        </div>
                        <p class="text-gray-500 text-sm mt-2">Enter the full name of the product</p>
                    </div>

                    <!-- Product Reference -->
                    <div>
                        <label for="reference" class="block text-gray-700 font-medium mb-2">
                            <i class="fas fa-barcode mr-2 text-green-500"></i>Reference Code *
                        </label>
                        <div class="relative">
                            <input type="text" id="reference" name="reference" required
                                class="w-full px-4 py-3 pl-10 border border-gray-300 rounded-lg input-focus focus:outline-none focus:border-green-500"
                                placeholder="e.g., PROD-2023-001">
                            <div class="absolute left-3 top-3.5 text-gray-400">
                                <i class="fas fa-hashtag"></i>
                            </div>
                        </div>
                        <p class="text-gray-500 text-sm mt-2">Unique identifier for the product</p>
                    </div>
                </div>

                <!-- Description -->
                <div class="mb-8">
                    <label for="description" class="block text-gray-700 font-medium mb-2">
                        <i class="fas fa-align-left mr-2 text-purple-500"></i>Product Description *
                    </label>
                    <textarea id="description" name="description" rows="4" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg input-focus focus:outline-none focus:border-purple-500"
                        placeholder="Provide a detailed description of the product including features, specifications, and usage..."></textarea>
                    <p class="text-gray-500 text-sm mt-2">Detailed information about the product</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
                    <!-- Price -->
                    <div>
                        <label for="price" class="block text-gray-700 font-medium mb-2">
                            <i class="fas fa-dollar-sign mr-2 text-yellow-500"></i>Price *
                        </label>
                        <div class="relative">
                            <input type="number" id="price" name="price" min="0" step="0.01" required
                                class="w-full px-4 py-3 pl-10 border border-gray-300 rounded-lg input-focus focus:outline-none focus:border-yellow-500"
                                placeholder="0.00">
                            <div class="absolute left-3 top-3.5 text-gray-400">
                                <i class="fas fa-money-bill-wave"></i>
                            </div>
                            <div class="absolute right-3 top-3.5 text-gray-500">
                                USD
                            </div>
                        </div>
                        <p class="text-gray-500 text-sm mt-2">Unit price in US dollars</p>
                    </div>

                    <!-- Stock -->
                    <div>
                        <label for="stock" class="block text-gray-700 font-medium mb-2">
                            <i class="fas fa-warehouse mr-2 text-red-500"></i>Stock Quantity *
                        </label>
                        <div class="relative">
                            <input type="number" id="stock" name="stock" min="0" required
                                class="w-full px-4 py-3 pl-10 border border-gray-300 rounded-lg input-focus focus:outline-none focus:border-red-500"
                                placeholder="Enter quantity">
                            <div class="absolute left-3 top-3.5 text-gray-400">
                                <i class="fas fa-layer-group"></i>
                            </div>
                        </div>
                        <select name="category_id" id="category_id">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option> 
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200">
                    <button type="submit" class="btn-submit text-white font-medium py-3 px-6 rounded-lg flex items-center justify-center">
                        <i class="fas fa-save mr-2"></i> Save Product
                    </button>
                    <button type="reset" id="resetBtn" class="bg-gray-100 text-gray-800 font-medium py-3 px-6 rounded-lg hover:bg-gray-200 transition duration-300 flex items-center justify-center">
                        <i class="fas fa-redo mr-2"></i> Clear Form
                    </button>
                </div>
            </form>
        </div>
</body>

</html>