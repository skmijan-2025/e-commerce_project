@extends('admin.admin_dashboard')
@section('admin')


<div class="page-content">
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Product Categories</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Product Categories</li>
    </ol>
</nav>

<div class="row">
    <div class="col-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Product Category</h4>

                <form action="" method="post" enctype="multipart/form-data">
                    @csrf 
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Category Photo</label>
                        <input type="file" name="photo" class="form-control" id="image" autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <img src="" alt="profile">
                    </div>

                    <input type="submit" class="btn btn-primary" value="Update Category">
                </form>
            </div>
        </div>
    </div>
</div>


</div>


@endsection