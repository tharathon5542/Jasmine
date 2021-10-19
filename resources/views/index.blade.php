@extends('layout')

@section('content')

@if( session('token') )
<div class="profile-header">
    <div class="profile-image">
        <img src="{{ URL::to('/') }}/image/{{ session('image') }}" alt="profileImage" width="500px">
    </div>
    <div class="profile-name">
        <p style="font-size: 40px;">Hello! </p>
        <p style="font-size: 25px; opacity: 80%;">{{ session('firstName') }} {{ session('lastName') }}</p>
    </div>
</div>
<br>
@endif


<h4>Our Contents</h4>
<div class="index-content-container">
    <a href="{{ route('englishPlayBoxGames', [1,1]) }}">English Play Box 1 Games</a>
    <a href="{{ route('videoByCategory', 44) }}">Tale</a>
</div><br>

<h4>Recent Upload</h4>
<div class="cards-container">
    @foreach($recentUpload as $key => $value)
    <a href=" {{ route('video.show', $value->videoID) }} ">
        <div class="card">
            <img src="{{ URL::to('/') }}/image/{{ $value->image }}" alt="Avatar">
            <div class="card-content">
                <h4><b>{{ Str::limit($value->videoName, 35) }}</b></h4>
                <p>{{ Str::limit($value->videoDescription, 45) }}</p>
                <p class="watchDate">{{ $value->updated_at }}</p>
            </div>
        </div>
    </a>
    @endforeach
</div>

<h4>Browse All</h4>
<div class="cards-container">

    @foreach($rawAllVideo as $key => $value)
    <a href="{{ route('video.show', $value->videoID) }}">
        <div class="card">
            <img src="{{ URL::to('/') }}/image/{{ $value->image }}" alt="Avatar">
            <div class="card-content">
                <h4><b>{{ Str::limit($value->videoName, 35) }}</b></h4>
                <p>{{ Str::limit($value->videoDescription, 45) }}</p>
                <p class="watchDate">{{ $value->created_at }}</p>
            </div>
        </div>
    </a>
    @endforeach

</div>

{{ $rawAllVideo->links('vendor.pagination.customPaginate') }}

@endsection
