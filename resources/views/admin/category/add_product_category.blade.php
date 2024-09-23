@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('category.page')}}">Product Categories</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Product Categories</li>
    </ol>
</nav>

<div class="row">
    <div class="col-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Product Category Name</h4>

                <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    
                    <div class="mb-3">
                        <label for="category" class="form-label">Product Category</label>
                        <input type="text" name="category_name", class="form-control" id="category">
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Product Photo</label>
                    <input type="file" name="photo", class="form-control" id="image" autocomplete="off" accept="image/*">
                    </div>

                    <div class="mb-3">
                        <img src="{{ url('upload/no_image.jpg') }}" alt="profile" id="ShowImage" class="wd-150 rounded" height="auto">
                    </div>

                    <input type="submit" class="btn btn-primary" value="Add Category">
                </form>
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

</div>



@endsection