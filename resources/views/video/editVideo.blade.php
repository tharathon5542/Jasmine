@extends('layout')

@section('content')

<div class="add-container">
    <h2>Edit Video</h2>
</div>
<br>
<div class="edit-container">
    <form action="{{ route('video.update', $video['videoID'])  }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="my-form-control">
            <div class="form-control-child">
                <label for="input_videoName">Video Name</label><br>
                <input type="text" style="width: 100%;" id="input_videoName" name="input_videoName" placeholder="Video Name" value="{{ $video->videoName }}" required maxlength="30">
            </div>
            <div class="form-control-child">
                <label for="input_category">Category</label><br>
                <select id="input_category" name="input_category" style="width: 100%;">
                    @foreach ($categories as $key => $value)
                    <option value="{{ $value->categoryID }}" {{ $video['categoryID'] === $value->categoryID ? "selected" : ""  }}>
                        {{ $value->categoryName }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="my-form-control">
            <div class="form-control-child" style="width: 400px;">
                <label for="input_videoDescription">Video Description</label><br>
                <textarea style="width: 100%; height: 150px;" id="input_videoDescription" name="input_videoDescription" placeholder="Video Description">{{ $video->videoDescription }}</textarea>
            </div>
        </div>
        <div class="my-form-control">
            <div class="form-control-child" style="width: 400px;">
                <label for="input_videoFile">Video File</label><br>
                <div class="file-container">
                    <input type="file" id="input_videoFile" name="input_videoFile" accept="video/mp4">
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
        </div>
        <div class="my-form-control">
            <div class="form-control-child" style="width: 400px;">
                <label for="input_files">Add Files</label><br>
                <div class="file-container">
                    <input type="file" id="input_files" name="input_files[]" multiple accept=".doc, .docx, .ppt, .pptx, .pdf">
                </div>
            </div>
        </div><br>
        <div class="my-form-control">
            <div class="form-control-child" style="width: 100%;">
                <label for="input_files">All Files</label><br>
                <table class="manage-video">
                    <tr>
                        <th width="120px">File ID</th>
                        <th>File Name</th>
                        <th>File</th>
                        <th>Created Date</th>
                        <th width="200px">Action</th>
                    </tr>
                    @foreach ($getFilesData as $key => $value)
                    <tr style="color: #fff;" id="fileID{{ $value->fileID }}">
                        <td>{{ $value->fileID }}</td>
                        <td>{{ $value->fileName }}</td>
                        <td>{{ $value->file }}</td>
                        <td>{{ $value->created_at }}</td>
                        <td>
                            <a href="{{ route('file.edit', $value->fileID) }}" class="btnEdit">Edit</a>

                            <button type="button" onclick="deleteFile('{{ $value->fileID }}')" style="padding: 5px; background: rgb(168, 0, 0); border: none;">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </table>

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
                <button type="submit">Edit Video</button>
                <a href="{{ route('video.index') }}">Back</a>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    function deleteFile(fileID) {
        if (confirm('Do you really want to delete this file?')) {
            $.ajax({
                url: '/fileOut/' + fileID,
                type: 'DELETE',
                data: {
                    _token: $("input[name=_token]").val()
                },
                success: function(response) {
                    $("#fileID" + fileID).remove()
                }
            });
        }
    }

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
                    alert('Video Has Been Update Successfully.');
                    location.reload();
                }
            });
        });
    });
</script>

@endsection
