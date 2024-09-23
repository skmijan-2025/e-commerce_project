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


                    <div class="mb-3">
                        <label for="" class="form-label">Product Price</label>
                        <input type="text" class="form-control" name="price" id="price" placeholder="price" value="">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Product Stock</label>
                        <input type="text" class="form-control" name="stock" id="stock" placeholder="Stock" value="">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Product Description</label>
                        <textarea name="description" id="description" class="form-control" rows="8" placeholder="Enter a detailed description of your product..."></textarea>
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