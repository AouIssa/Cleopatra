<div class="col-md-4 col-sm-6 mb-4">
    <div class="card">
        <img src="{{ $product['image'] }}" class="card-img-top" alt="{{ $product['name'] }}" style="max-width: 100%; max-height: 200px; height: auto; min-height: 50px;">
        <div class="card-body">
            <h5 class="card-title">{{ $product['name'] }}</h5>
            <p class="card-text">{{ $product['description'] }}</p>
            <p class="card-text"><strong>Price:</strong> ${{ $product['price'] }}</p>
            <a href="#" class="btn btn-primary">View Product</a>
        </div>
    </div>
</div>
