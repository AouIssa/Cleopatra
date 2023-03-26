<div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/4 p-2 mb-4 mx-auto">
    <div class="bg-white border border-gray-200 rounded shadow-sm">
        <img src="{{ asset($product->image) }}" class="w-full object-cover h-[200px] object-center rounded-t" alt="{{ $product->name }}">
        <div class="p-4">
            <h5 class="text-lg font-semibold mb-2">{{ $product->name }}</h5>
            <p class="text-sm text-gray-700 mb-4">{{ $product->description }}</p>
            <p class="text-base font-semibold mt-2 mb-4"><strong>Price:</strong> ${{ $product->price }}</p>
            <a href="#" class="block w-full bg-blue-500 hover:bg-blue-600 text-white rounded px-4 py-2 mt-3 text-center">View Product</a>
        </div>
    </div>
</div>
