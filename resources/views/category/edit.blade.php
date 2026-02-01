<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category - {{ $category->name }}</title>
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
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-3">Edit Category</h1>
            <p class="text-gray-600 max-w-2xl mx-auto">Update the details for "{{ $category->name }}" category.</p>
        </div>

        <div class="form-container bg-white rounded-xl overflow-hidden">
            <!-- Header -->
            <div class="header-gradient text-white p-6">
                <div class="flex flex-col md:flex-row md:items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold">Edit Category</h2>
                        <p class="text-blue-100 mt-1">Modify the category information below</p>
                    </div>
                    <div class="mt-4 md:mt-0">
                        <span class="inline-block bg-blue-800 text-white px-4 py-2 rounded-lg font-medium">
                            <i class="fas fa-edit mr-2"></i> Edit Mode
                        </span>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('category.update', $category->id) }}" class="p-6 md:p-8">
                @csrf
                @method('PUT')
                
                <!-- Success/Error Messages -->
                @if(session('success'))
                    <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <p class="text-green-800">{{ session('success') }}</p>
                        </div>
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                        <div class="flex items-center">
                            <i class="fas fa-exclamation-circle text-red-500 mr-2"></i>
                            <p class="text-red-800">{{ session('error') }}</p>
                        </div>
                    </div>
                @endif
                
                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="mb-6 bg-red-50 border border-red-200 rounded-lg p-4">
                        <div class="flex">
                            <div class="shrink-0">
                                <i class="fas fa-exclamation-circle text-red-400 text-lg"></i>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-red-800">There were some errors with your submission:</h3>
                                <ul class="mt-2 text-sm text-red-700">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="space-y-6">
                    <!-- Category Name -->
                    <div>
                        <label for="name" class="block text-gray-700 font-medium mb-2">
                            <i class="fas fa-tag mr-2 text-blue-500"></i>Category Name *
                        </label>
                        <div class="relative">
                            <input type="text" id="name" name="name" value="{{ $category->name }}" required
                                class="w-full px-4 py-3 pl-10 border border-gray-300 rounded-lg input-focus focus:outline-none focus:border-blue-500"
                                placeholder="Enter category name">
                            <div class="absolute left-3 top-3.5 text-gray-400">
                                <i class="fas fa-tag"></i>
                            </div>
                        </div>
                        <p class="text-gray-500 text-sm mt-2">Enter the name of the category</p>
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-gray-700 font-medium mb-2">
                            <i class="fas fa-align-left mr-2 text-green-500"></i>Description
                        </label>
                        <div class="relative">
                            <textarea id="description" name="description" rows="4"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg input-focus focus:outline-none focus:border-green-500"
                                placeholder="Provide a description for this category...">{{ $category->description ?? '' }}</textarea>
                        </div>
                        <p class="text-gray-500 text-sm mt-2">Optional: Add a detailed description</p>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200 mt-8">
                    <button type="submit" class="btn-submit text-white font-medium py-3 px-6 rounded-lg flex items-center justify-center">
                        <i class="fas fa-save mr-2"></i> Update Category
                    </button>
                    <a href="{{ route('category.index') }}" class="bg-gray-100 text-gray-800 font-medium py-3 px-6 rounded-lg hover:bg-gray-200 transition duration-300 flex items-center justify-center">
                        <i class="fas fa-arrow-left mr-2"></i> Back to Categories
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
