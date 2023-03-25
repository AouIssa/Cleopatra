@extends('layouts.app')

@section('content')
    <!-- Hero section -->
    <div class="relative">
        <img src="storage/images/home.png" alt="Hero image" class="w-full h-full object-cover">
        <div class="absolute inset-0 flex items-center justify-center">
            <h1 class="text-black text-9xl font-normal font-fell-french-canon">CLEOPATRA</h1>
        </div>
    </div>

    <!-- Products section -->
<section class="container mx-auto px-6 py-8">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Featured Products</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Loop through your products and display each product here -->
        @foreach($products as $product)
            <div class="bg-white rounded shadow p-4">
                <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full h-48 object-cover mb-4">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $product['name'] }}</h3>
                <p class="text-gray-600 mb-4">{{ $product['description'] }}</p>
                <div class="flex items-center justify-between">
                    <span class="text-xl font-bold text-gray-800">${{ number_format($product['price'], 2) }}</span>
                    <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add to Cart</a>
                </div>
            </div>
        @endforeach
    </div>
</section>

<!-- Trending section -->
<section class="container mx-auto px-6 py-8">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6 ">Trending</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 justify-items-center">
        <div class="w-full md:w-auto">
            <img src="storage/images/long.png" alt="Long image" class="w-full h-full object-cover rounded">
        </div>
        <div class="col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-8">
            <img src="storage/images/trendingImage1.png" alt="Image 1" class="w-full h-32 md:h-40 lg:h-64 object-cover rounded">
            <img src="storage/images/trendingImage2.png" alt="Image 2" class="w-full h-32 md:h-40 lg:h-64 object-cover rounded">
            <img src="storage/images/trendingImage3.png" alt="Image 3" class="w-full h-32 md:h-40 lg:h-64 object-cover rounded">
            <img src="storage/images/trendingImage4.png" alt="Image 4" class="w-full h-32 md:h-40 lg:h-64 object-cover rounded">
        </div>
    </div>
</section>

@endsection
