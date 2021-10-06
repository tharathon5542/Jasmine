@extends('layout')

@section('content')

<div class="add-container">
    <h2>Add Category</h2>
</div>
<br>
<div class="edit-container">
    <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="my-form-control">
            <div class="form-control-child">
                <label for="input_categoryName">Category Name</label><br>
                <input type="text" style="width: 300px;" id="input_categoryName" name="input_categoryName" placeholder="Category Name" required maxlength="50">
            </div>
            <!-- <div class="form-control-child">
                <label for="input_image">Category Image</label>
                <div class="file-container">
                    <input type="file" id="input_image" name="input_image" accept=".jpg, .png, .jpeg" onchange="imagePreview(this.files[0])">
                </div>
            </div> -->
        </div>
        <div class="my-form-control">
            <img id="categoryImage" class="CategoryAddImageReview" src="" alt="" width="250px" height="250px">
        </div>
        <div class="form-control-submit">
            <button type="submit">Add Category</button>
            <a href="{{ route('category.index') }}">Back</a>
        </div>
    </form>
</div>

<script>
    function imagePreview(file) {
        document.getElementById('categoryImage').classList.remove('CategoryAddImageReview')

        document.getElementById('categoryImage').src = window.URL.createObjectURL(file)
    }
</script>

@endsection
