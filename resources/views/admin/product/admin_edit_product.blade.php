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

                <form action="{{ route('admin.update.product', $product->id) }}"
                method="post" enctype="multipart/form-data">
                    @csrf 
                    @method('PUT')

                    <div class="mb-3">
                        <label for="" class="form-label">Product Photo</label>
                        <input type="file" name="photo" class="form-control" id="image" autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <img src="{{ $product->photo ? asset('upload/admin_images/' . $product->photo) : url('upload/no_image.jpg') }}"
                        alt="profile" class="wd-150 rounded" height="150px" id="ShowImage">
                    </div>

                    <div class="form-group mb-3">
                        <label for="category" class="form-label">Product Category</label>
                        <select name="category_id" id="category" class="form-control">
                            <option value="" selected disabled>--  Select Product Category --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                                @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Product Name</label>
                        <input type="text" class="form-control" name="name" id="name" autocomplete="off"
                        placeholder="Name" value="{{ $product->name }}">
                    </div>


                    <div class="mb-3">
                        <label for="" class="form-label">Product Price</label>
                        <input type="text" class="form-control" name="price" id="price" placeholder="price"
                        value="{{ $product->price }}">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Product Stock</label>
                        <input type="text" class="form-control" name="stock" id="stock" placeholder="Stock"
                        value="{{ $product->stock }}">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Product Description</label>
                        <textarea name="description" id="description" class="form-control" rows="8" placeholder="Enter a detailed description of your product...">
                            {{ $product->description }}
                        </textarea>
                    </div>

                    <button type="submit" class="btn btn-primary me-2">Update Product</button>
                    <button type="submit" class="btn btn-secondary">Cancel</button>
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