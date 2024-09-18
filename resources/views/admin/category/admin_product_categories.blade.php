@extends('admin.admin_dashboard')

@section('admin')

<div class="page-content">




<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="git ">Product Categories</a></li>
        <li class="breadcrumb-item active" aria-current="page">Product Categories List</li>
    </ol>
</nav>

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between allign-items-center mb-4">
                <h6 class="card-title">Product Category List</h6>
                <a href="{{route('add.products')}}" class="btn btn-primary">Add Product Category</a>
            </div>
        </div>
    </div>
</div>


















</div>




@endsection


