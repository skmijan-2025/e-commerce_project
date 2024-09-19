@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Products</a></li>
        <li class="breadcrumb-item active" aria-current="page">Products List</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12" grid-margin stretch-card>
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between allign-items-center mb-4">
                    <h6 card="card-title mb-0">Products Lists</h6>
                    <a href="" class="btn btn-primary"><i class="fas fa-plus"></i>Add Product</a>
                </div>

                Product Categories

                <div class="mb-4">
                    <h6 class="card-title">Product Categories</h6>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach ($categories as $category)
                        <div class="p-2 bg-light border rounded">
                            {{ $category->category_name }}
                            <span class="badge bg-primary">{{ $category->products->count() }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

            Product Table

            <div class="table-responsive">
                <table id="dataTableExample" class="table table-hover text-center">
                    <thead class="table-primary">
                            <tr>
                              <th class="text-center">#</th>
                              <th class="text-center">Iamge</th>
                              <th class="text-center">Name</th>
                              <th class="text-center">Category</th>
                              <th class="text-center">Price</th>
                              <th class="text-center">Stock</th>
                              <th class="text-center">Action</th>  
                            </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <!-- End of product table -->
            </div>
        </div>
    </div>
</div>



</div>

@endsection