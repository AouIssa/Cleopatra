@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h1 class="text-center">Welcome to Cleopatra!</h1>
                <h3 class="text-center">Shop our latest collection</h3>
            </div>
        </div>
        <div class="row mt-4">
            @foreach($products as $product)
                @include('product-card', ['product' => $product])
            @endforeach
        </div>
    </div>
@endsection
