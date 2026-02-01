<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
        }

        .header-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }
    </style>
</head>

<body class="bg-gray-50">
    <div class="container mx-auto px-4 py-8 max-w-6xl">
        <div class="mb-10 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-3">Categories Management</h1>
            <p class="text-gray-600 max-w-2xl mx-auto">Manage your product categories with this comprehensive system.</p>
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <!-- Header -->
            <div class="header-gradient text-white p-6">
                <div class="flex flex-col md:flex-row md:items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold">All Categories</h2>
                        <p class="text-blue-100 mt-1">View and manage your product categories</p>
                    </div>
                    <div class="mt-4 md:mt-0">
                        <a href="{{ route('category.create') }}" class="btn-primary text-white font-medium py-2 px-4 rounded-lg inline-flex items-center">
                            <i class="fas fa-plus mr-2"></i> Add New Category
                        </a>
                    </div>
                </div>
            </div>

            <!-- Categories Table -->
            <div class="p-6">
                @if($categories->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full table-auto">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200">
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <i class="fas fa-hashtag mr-2"></i>ID
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <i class="fas fa-tag mr-2"></i>Category Name
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <i class="fas fa-align-left mr-2"></i>Description
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <i class="fas fa-calendar mr-2"></i>Created At
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($categories as $category)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $category->id }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">
                                    {{ $category->name }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">
                                    {{ $category->description ? Str::limit($category->description, 100) : 'No description' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $category->created_at->format('M d, Y') }}
                                </td>
                                <td>
                                    <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-5 py-4 text-red-600 hover:text-red-800" onclick="return confirm('Are you sure you want to delete this category?')">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                    <a class="px-5 py-4" href="{{ route('category.edit',$category->id) }}"><i class="fa-regular fa-pen-to-square"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="text-center py-12">
                    <i class="fas fa-folder-open text-6xl text-gray-300 mb-4"></i>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">No categories found</h3>
                    <p class="text-gray-500 mb-6">Get started by creating your first category.</p>
                    <a href="{{ route('category.create') }}" class="btn-primary text-white font-medium py-2 px-6 rounded-lg inline-flex items-center">
                        <i class="fas fa-plus mr-2"></i> Create First Category
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</body>

</html>