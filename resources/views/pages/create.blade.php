@extends('layouts.app')

@section('content')

<div class="">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                <a href="{{ route('products.index')}}" class="btn btn-success" data-bs-dismiss="modal" aria-label="Close">Back</a>
            </div>
            <form action="{{ route('products.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    
                        <div class="container">
                            <div class="row">
                                <div class="col-12 p-1">
                                    <label class="form-label">product_id *</label>
                                    <input type="text" class="form-control" name="product_id">
                                </div>
                                <div class="col-12 p-1">
                                    <label class="form-label">name *</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="col-12 p-1">
                                    <label class="form-label">description </label>
                                    <input type="text" class="form-control" name="description">
                                </div>
                                <div class="col-12 p-1">
                                    <label class="form-label">price *</label>
                                    <input type="text" class="form-control" name="price">
                                </div>
                                <div class="col-12 p-1">
                                    <label class="form-label">stock </label>
                                    <input type="text" class="form-control" name="stock">
                                </div>
                                <div class="col-12 p-1">
                                    <label class="form-label">image </label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                                
                            </div>
                        </div>
                    
                </div>
                <div class="modal-footer">
                    
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection