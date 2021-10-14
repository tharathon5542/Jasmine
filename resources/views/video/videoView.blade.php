@extends('layout')

@section('content')

<div class="video-container">
    <div class="video-view">
        <video id="example_video_1" controls autoplay preload="auto" height="500" width="800" style="background: #000;">
            <source src="{{ route('stream', $video->videoFile) }}" type="video/mp4">
            Your browser does not support HTML video.
        </video>
        <h3>{{ $video->videoName }}</h3>
        <p class="category">Category : {{ $categoryData[0]->categoryName }}, Upload Date : {{ $video->created_at }}</p><br>
        <h4>Description</h4>
        <p>{{ $video->videoDescription }}</p><br>
        <h4>Same Category Videos</h4>
        <div class="same-category">
            @foreach($sameCategoryData as $key => $value)
            <a href="{{ route('video.show', $value->videoID) }}">
                <div class="card">
                    <img src="{{ URL::to('/') }}/image/{{ $value->image }}" alt="Avatar"><br><br>
                    <h4><b>{{ Str::limit($value->videoName, 35) }}</b></h4>
                    <p>{{ Str::limit($value->videoDescription, 45) }}</p><br>
                    <p class="uploadDate">{{ $value->created_at }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    <div class="video-files">
        <h4>All Files</h4>
        <hr>
        <div class="files-container">
            @foreach($files as $key => $value)
            <div class="file">
                <div class="file-name">
                    {{ $value->fileName }}
                </div>
                <div class="download-btn">
                    <a href="{{ route('downloadFile', $value->fileID) }}">Download</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
