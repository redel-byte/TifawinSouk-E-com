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

  <body class="min-h-screen bg-gray-50">
    <div class="container px-4 py-8 mx-auto">
      <div class="justify-between mb-8">
        <h1 class="text-3xl font-bold text-center text-gray-800">Products List</h1>
        <div class="mt-4 text-center">
          <a href="{{ route('products.create')}}" id="toggleFormBtn" class="inline-block p-2 px-4 transition bg-gray-200 add_product--btn border-xl rounded-xl hover:bg-gray-300">
            Add Product
          </a>
        </div>
      </div>

            <!-- Products Table -->
      <div class="overflow-hidden bg-white rounded-lg shadow-lg">
        <div class="overflow-x-auto">
          <table class="w-full border-collapse">
            <thead class="bg-gray-100 border-b-2 border-gray-200">
              <tr>
                <th class="px-6 py-4 text-sm font-semibold tracking-wider text-left text-gray-700 uppercase">Product</th>
                <th class="px-6 py-4 text-sm font-semibold tracking-wider text-left text-gray-700 uppercase">Reference</th>
                <th class="px-6 py-4 text-sm font-semibold tracking-wider text-left text-gray-700 uppercase">Description</th>
                <th class="px-6 py-4 text-sm font-semibold tracking-wider text-left text-gray-700 uppercase">Category</th>
                <th class="px-6 py-4 text-sm font-semibold tracking-wider text-left text-gray-700 uppercase">Price</th>
                <th class="px-6 py-4 text-sm font-semibold tracking-wider text-left text-gray-700 uppercase">Stock</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
              @foreach ($products as $product)
              <tr class="transition-colors duration-200 hover:bg-gray-50">
                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $product->name }}</td>
                <td class="px-6 py-4 text-sm text-gray-600">{{ $product->reference }}</td>
                <td class="px-6 py-4 text-sm text-gray-600">{{ $product->description ?? 'N/A' }}</td>
                <td class="px-6 py-4 text-sm text-gray-600">{{ $product->category ? $product->category->name : 'No Category' }}</td>
                <td class="px-6 py-4 text-sm font-semibold text-green-600">${{ number_format($product->price, 2) }}</td>
                <td class="px-6 py-4 text-sm">
                  @if($product->stock > 10)
                  <span class="inline-flex px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">
                    In Stock ({{ $product->stock }})
                  </span>
                  @elseif($product->stock > 0)
                  <span class="inline-flex px-2 py-1 text-xs font-semibold text-yellow-800 bg-yellow-100 rounded-full">
                    Low Stock ({{ $product->stock }})
                  </span>
                  @else
                  <span class="inline-flex px-2 py-1 text-xs font-semibold text-red-800 bg-red-100 rounded-full">
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
      <div class="py-12 text-center">
        <p class="text-lg text-gray-500">No products found.</p>
      </div>
      @endif
    </div>
</main>
</body>

</html>