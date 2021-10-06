@extends('layout')

@section('content')

<div class="add-container">
    <h2>Edit Category</h2>
</div>
<br>
<div class="edit-container">
    <form action="{{ route('category.update', $category['categoryID']) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="my-form-control">
            <div class="form-control-child">
                <label for="input_categoryName">Category Name</label><br>
                <input type="text" style="width: 300px;" id="input_categoryName" name="input_categoryName" value="{{ $category['categoryName'] }}" placeholder="Category Name" required maxlength="50">
            </div>
            <!-- <div class="form-control-child">
                <label for="input_image">Category Image</label>
                <div class="file-container">
                    <input type="file" id="input_image" name="input_image" accept=".jpg, .png, .jpeg" onchange="document.getElementById('categoryImage').src = window.URL.createObjectURL(this.files[0])">
                </div>
            </div> -->
        </div>
        <!-- <div class="my-form-control">
            <img id="categoryImage" src="{{ URL::to('/') }}/image/{{ $category['image'] }}" alt="" width="250px" height="250px">
        </div> -->
        <div class="form-control-submit">
            <button type="submit">Edit Category</button>
            <a href="{{ route('category.index') }}">Back</a>
        </div>
    </form>
</div>

@endsection
