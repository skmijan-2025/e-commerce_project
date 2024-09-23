@extends('admin.admin_dashboard')
@section('admin')

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->

<div class="page-content">

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.product')}}">Products</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Product</li>
    </ol>
</nav>

<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="mb-3">Edit Product</h3>

                <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                    @csrf 
                    

                    <div class="mb-3">
                        <label for="" class="form-label">Product Photo</label>
                        <input type="file" name="photo" class="form-control" id="image" autocomplete="off" accept="image/*">
                    </div>

                    <div class="mb-3">
                        <img src="{{ url('upload/no_image.jpg') }}" alt="profile" class="wd-100 rounded" height="auto" id="ShowImage">
                    </div>

                    <div class="form-group mb-3">
                        <label for="category" class="form-label">Product Category</label>
                        <select name="category_id" id="category" class="form-control" required>
                            <option value="" selected disabled>-- Select Product Category --</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Product Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="name">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Product Price</label>
                        <input type="text" class="form-control" name="price" id="price" placeholder="price">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Product Stock</label>
                        <input type="text" class="form-control" name="stock" id="stock" placeholder="Stock">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Product Description</label>
                        <textarea name="description" id="description" class="form-control" rows="8"
                        placeholder="Enter a detailed description of your product..."></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary me-2">Add Product</button>
                    <button type="reset" class="btn btn-secondary">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>


</div>

<script>
        // Get references to the input and the image preview elements
        const image = document.getElementById('image');
        const ShowImage = document.getElementById('ShowImage');

        // Add an event listener for when the file input changes
        image.addEventListener('change', function() {
            const file = this.files[0]; // Get the selected file

            // Check if a file was selected and if it's an image
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();

                // When the file is read, set the image source to the result and show the image
                reader.onload = function(e) {
                    ShowImage.src = e.target.result; // Set the src attribute to the file data
                    ShowImage.style.display = 'block'; // Make the image visible
                };

                // Read the image file as a Data URL
                reader.readAsDataURL(file);
            } else {
                ShowImage.style.display = 'none'; // Hide the preview if no valid image
            }
        });
    </script>


@endsection