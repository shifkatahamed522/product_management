
@extends('layouts.app')
@section('title', 'Product Details')
@section('content')
    {{-- <h1>{{ $product->name }}</h1>
    <p>Product ID: {{ $product->product_id }}</p>
    <p>Description: {{ $product->description }}</p>
    <p>Price: ${{ $product->price }}</p>
    <p>Stock: {{ $product->stock }}</p>
    @if($product->image)
        <p><img src="{{ asset($product->image) }}" alt="{{ $product->name }}" width="300"></p>
    @endif

    <a href="{{ route('products.edit', $product->id) }}">Edit</a>

    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form> --}}

    <div class="container-fluid w-75 mt-3 modal-dialog">
        <div class="row modal-content">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <h2>{{ $product->name }}</h2>

                <div>
                    <!-- Display product image if available -->
                    @if($product->image)
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" width="300">
                    @endif
                </div>

                <div>
                    <strong>Product ID:</strong> {{ $product->product_id }}
                </div>

                <div>
                    <strong>Description:</strong> 
                    <p>{{ $product->description ? $product->description : 'No description available' }}</p>
                </div>

                <div>
                    <strong>Price:</strong> ${{ $product->price }}
                </div>

                <div>
                    <strong>Stock:</strong> {{ $product->stock ? $product->stock : 'Out of stock' }}
                </div>

                <div>
                    <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </div>

                <a href="{{ route('products.index') }}">Back to Product List</a>
            </div>
        </div>
    </div>

    
@endsection
