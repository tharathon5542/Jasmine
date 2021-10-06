@extends('layout')

@section('content')

<div class="add-container">
    <h2>Edit File</h2>
</div>
<br>
<div class="edit-container">
    <form action="{{ route('file.update', $file->fileID)  }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="my-form-control">
            <div class="form-control-child">
                <label for="input_fileName">File Name</label><br>
                <input type="text" style="width: 300px;" id="input_fileName" name="input_fileName" value="{{ ($file->fileName) }}" placeholder="File Name" maxlength="50">
            </div>
            <div class="form-control-submit">
                <button type="submit">Edit File Name</button>
                <a href="{{ route('video.edit', $file->videoID) }}">Back</a>
            </div>
    </form>
</div>

@endsection
