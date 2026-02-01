<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="../../js/index.js" defer></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <title>Products</title>
</head>

<main>

  <body class="bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 py-8">
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
      
      <div class="justify-between mb-8">
        <h1 class="text-3xl font-bold text-gray-800 text-center">Products List</h1>
        <div class="text-center mt-4">
          <a href="{{ route('products.create') }}" id="toggleFormBtn" class="add_product--btn border-xl rounded-xl bg-gray-200 p-2 px-4 hover:bg-gray-300 transition inline-block">
            Add Product
          </a>
        </div>
      </div>

            <!-- Products Table -->
      <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
          <table class="w-full border-collapse">
            <thead class="bg-gray-100 border-b-2 border-gray-200">
              <tr>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Product</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Reference</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Description</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Category</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Price</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Stock</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
              @foreach ($products as $product)
              <tr class="hover:bg-gray-50 transition-colors duration-200">
                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $product->name }}</td>
                <td class="px-6 py-4 text-sm text-gray-600">{{ $product->reference }}</td>
                <td class="px-6 py-4 text-sm text-gray-600">{{ $product->description ?? 'N/A' }}</td>
                <td class="px-6 py-4 text-sm text-gray-600">{{ $product->category ? $product->category->name : 'No Category' }}</td>
                <td class="px-6 py-4 text-sm font-semibold text-green-600">${{ number_format($product->price, 2) }}</td>
                <td class="px-6 py-4 text-sm">
                  @if($product->stock > 10)
                  <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                    In Stock ({{ $product->stock }})
                  </span>
                  @elseif($product->stock > 0)
                  <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                    Low Stock ({{ $product->stock }})
                  </span>
                  @else
                  <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                    Out of Stock
                  </span>
                  @endif
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      @if($products->isEmpty())
      <div class="text-center py-12">
        <p class="text-gray-500 text-lg">No products found.</p>
      </div>
      @endif
    </div>
</main>
</body>

</html>