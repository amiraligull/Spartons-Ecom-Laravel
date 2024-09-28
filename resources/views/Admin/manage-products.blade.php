@extends('layouts.master')
@section('content')
<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>

<div class="main">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Manage Products</h3>
        </div>

        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addProductModal">
                    Add Product
                </button>
            </div>

            <!-- Add Product Modal -->
            <div class="modal fade" id="addProductModal">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Product</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('add-product') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="productTitle">Product Title</label>
                                    <input type="text" class="form-control" name="title"
                                        placeholder="Enter product title">
                                </div>
                                <div class="form-group">
                                    <label for="productCategory">Category</label>
                                    <select class="form-control" name="category_id">
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="productPrice">Price</label>
                                    <input type="number" class="form-control" name="price"
                                        placeholder="Enter product price">
                                </div>
                                <div class="form-group">
                                    <label for="productQuantity">Quantity</label>
                                    <input type="number" class="form-control" name="quantity"
                                        placeholder="Enter quantity">
                                </div>
                                <div class="form-group">
                                    <label for="productImage">Product Image</label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                                <div class="form-group">
                                    <label for="productDescription">Description</label>
                                    <textarea class="form-control" name="description"
                                        placeholder="Enter product description"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Product Table -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Product Image</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $product->title }}</td>
                            <td>
                                <!-- Display the product image -->
                                @if($product->image)
                                <img src="{{ url('public/images/' . $product->image) }}" alt="Product Image" width="80"
                                    height="80">
                                @else
                                <span>No Image</span>
                                @endif
                            </td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success">Options</button>
                                    <button type="button" class="btn btn-success dropdown-toggle"
                                        data-toggle="dropdown">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <button type="button" class="btn btn-warning" data-toggle="modal"
                                            data-target="#editProductModal{{ $product->id }}">
                                            Edit
                                        </button>
                                        <form action="{{ route('delete-product', $product->id) }}" method="post"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <!-- Edit Product Modal -->
                        <div class="modal fade" id="editProductModal{{ $product->id }}">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit Product</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('update-product', $product->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="editProductTitle">Product Title</label>
                                                <input type="text" class="form-control" name="title"
                                                    value="{{ $product->title }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="editProductCategory">Category</label>
                                                <select class="form-control" name="category_id">
                                                    @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ $product->category_id ==
                                                        $category->id ? 'selected' : '' }}>{{ $category->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="editProductPrice">Price</label>
                                                <input type="number" class="form-control" name="price"
                                                    value="{{ $product->price }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="editProductQuantity">Quantity</label>
                                                <input type="number" class="form-control" name="quantity"
                                                    value="{{ $product->quantity }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="editProductImage">Product Image</label>
                                                <input type="file" class="form-control" name="image">
                                            </div>
                                            <div class="form-group">
                                                <label for="editProductDescription">Description</label>
                                                <textarea class="form-control"
                                                    name="description">{{ $product->description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>Product Image</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>

@endsection