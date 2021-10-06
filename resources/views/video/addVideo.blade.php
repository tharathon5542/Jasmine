@extends('layout')

@section('content')

<div class="add-container">
    <h2>Upload Video</h2>
</div>
<br>
<div class="edit-container">
    <form action="{{ route('video.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="my-form-control">
            <div class="form-control-child">
                <label for="input_videoName">Video Name</label><br>
                <input type="text" style="width: 100%;" id="input_videoName" name="input_videoName" placeholder="Video Name" required maxlength="30">
            </div>
            <div class="form-control-child">
                <label for="input_category">Category</label><br>
                <select id="input_category" name="input_category" style="width: 100%;">
                    @foreach ($categories as $key => $value)
                    <option value="{{ $value->categoryID }}">
                        {{ $value->categoryName }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="my-form-control">
            <div class="form-control-child" style="width: 400px;">
                <label for="input_videoDescription">Video Description</label><br>
                <textarea style="width: 100%; height: 150px;" id="input_videoDescription" name="input_videoDescription" placeholder="Video Description"></textarea>
            </div>
        </div>
        <div class="my-form-control">
            <div class="form-control-child" style="width: 400px;">
                <label for="input_videoFile">Video File</label><br>
                <div class="file-container">
                    <input type="file" id="input_videoFile" name="input_videoFile" accept="video/mp4" required>
                </div>
            </div>
        </div>
        <div class="my-form-control">
            <div class="form-control-child" style="width: 400px;">
                <label for="input_videoThumbnail">Video Thumbnail</label><br>
                <div class="file-container">
                    <input type="file" id="input_videoThumbnail" name="input_videoThumbnail" accept=".jpg, .png, .jpeg">
                </div>
            </div>
        </div><br>
        <div class="my-form-control">
            <div class="form-control-child" style="width: 400px;">
                <label for="input_files">Upload Progress bar</label><br>
                <div class="progress">
                    <div class="bar"></div>
                    <div class="percent">0%</div>
                </div>
            </div>
        </div>
        <div class="my-form-control">
            <div class="form-control-submit">
                <button type="submit">Upload Video</button>
                <a href="{{ route('video.index') }}">Back</a>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    $(function() {
        $(document).ready(function() {
            var bar = $('.bar');
            var percent = $('.percent');
            $('form').ajaxForm({
                beforeSend: function() {
                    var percentVal = '0%';
                    bar.width(percentVal)
                    percent.html(percentVal);
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    var percentVal = percentComplete + '%';
                    bar.width(percentVal)
                    percent.html(percentVal);
                },
                complete: function(xhr) {
                    alert('Video Has Been Uploaded Successfully.');
                    location.reload();
                }
            });
        });
    });
</script>

@endsection
