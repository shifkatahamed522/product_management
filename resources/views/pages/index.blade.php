

@extends('layouts.app')
@section('title', 'All Products')
@section('content')

<div class="container-fluid w-75 mt-3">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card px-5 py-5">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2><b>Products Management</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{route('products.create')}}" class="btn btn-success" ><i class="material-icons">&#xE147;</i> <span>Add New Products</span></a>					
                        </div>
                    </div>
                </div>
                
                <h5><a href="{{ route('products.index')}}" class="" data-bs-dismiss="modal" aria-label="Close">Products List</a></h5>
                <!-- Search Form -->
                <form action="{{ route('products.index') }}" method="GET">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by Product ID or Description">
                    <button type="submit">Search</button>
                </form>

            @if($products->count() > 0)
                <table class="table table-hover" id="">
                    <thead>
                        <tr>
                            <!-- Sort by name -->
                            <th>
                                <a href="{{ route('products.index', ['sort_by' => 'name', 'sort_order' => request('sort_order') === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}">
                                    Name 
                                    @if(request('sort_by') === 'name')
                                        {{ request('sort_order') === 'asc' ? '↑' : '↓' }}
                                    @endif
                                </a>
                            </th>
        
                            <!-- Sort by price -->
                            <th>
                                <a href="{{ route('products.index', ['sort_by' => 'price', 'sort_order' => request('sort_order') === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}">
                                    Price 
                                    @if(request('sort_by') === 'price')
                                        {{ request('sort_order') === 'asc' ? '↑' : '↓' }}
                                    @endif
                                </a>
                            </th>
        
                            
                        </tr>
                    </thead>

                    <thead>
                        <tr class="bg-light">
                            <th>id</th>
                            <th>product_id</th>
                            <th>name</th>
                            <th>description</th>
                            <th>price</th>
                            <th>stock</th>
                            <th>image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="tableList">

                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->product_id }}</td>
                                <td><a href="{{ route('products.show', $product->id) }}">
                                    {{ $product->name }}
                                </a></td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>
                                    @if($product->image)
                                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" width="50px" height="50px">
                                    @endif
                                </td>
                                <td class="d-flex" style="height: 77px" >
                                    
                                    <a href="{{ route('products.edit', $product->id) }}" class="edit mt-3" ><i class="material-icons" title="Edit">&#xE254;</i></a>
                                    <form action="{{route('products.destroy', $product->id)}}" method="POST" id="deleteForm">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" class="delete mt-3" data-bs-toggle="modal" data-bs-target="#deleteProductModal">
                                            <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                                        </a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach        
                    </tbody>
                </table>
              <!-- Add pagination links -->
            <div class="pagination">
                {{ $products->appends(['search' => request('search'), 'sort_by' => request('sort_by'), 'sort_order' => request('sort_order')])->links() }}
                {{-- {{ $products->appends(['search' => request('search')])->links() }}  <!-- This generates the pagination links --> --}}
            </div>
            @else
                <p>No products found.</p>
            @endif

            </div>
        </div>
    </div>
</div>
<!-- Add Products -->


<!-- Delete Modal HTML -->
<div class="modal fade" id="deleteProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3 class=" mt-3 text-warning">Delete !</h3>
                <p class="mb-3">Once delete, you can't get it back.</p>
                <input class="" hidden id="deleteID"/>
            </div>
            <div class="modal-footer">
                <button type="button" id="delete-modal-close" class="btn shadow-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button onclick="itemDelete()" type="button" id="confirmDelete" class="btn shadow-sm btn-danger" >Delete</button>
            </div>
        </div>
    </div>
</div>
    
<script>
    document.getElementById('confirmDelete').addEventListener('click', function () {
        document.getElementById('deleteForm').submit();
    });
</script>


@endsection