@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Products</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
    </ol>
</nav>

<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="mb-3">Edit Product</h3>

                <!-- <div class="d-flex justify-content-end">
                    <button class="btn btn-primary">Primary</button>
                </div> -->

                <form action="" method="post" enctype="multipart/form-data">
                    @csrf 
                    @method('PUT')

                    <div class="mb-3">
                        <label for="" class="form-label">Product Photo</label>
                        <input type="file" name="photo" class="form-control" id="image" autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <img src="" alt="profile" class="wd-150 rounded" height="150px">
                    </div>

                    <div class="form-group mb-3">
                        <label for="category" class="form-label">Product Category</label>
                        <select name="category_id" id="category" class="form-control">
                            <option value=""selected disabled>-- Select Product Category --</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Product Price</label>
                        <input type="text" class="form-control" name="price" id="price" placeholder="price" value="{{ $product->price }}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Product Stock</label>
                        <input type="text" class="form-control" name="stock" id="stock" placeholder="Stock" value="{{ $product->stock }}">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Product Description</label>
                        <textarea name="description" id="description" class="form-control" rows="8" placeholder="Enter a detailed description of your product...">{{ $product->description }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary me-2">Update Product</button>
                    <button type="submit" class="btn btn-secondary">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>


</div>

@endsection