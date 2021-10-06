@extends('layout')

@section('content')

<div class="profile-header">
    <div class="profile-image">
        <img src="{{ URL::to('/') }}/image/{{ $profile['image'] }}" alt="profileImage" width="500px">
    </div>
    <div class="profile-name">
        <div class="profile-name-edit">
            <h3>Profile</h3>
            <a href=" {{ route('profile.edit', session('profileID')) }} ">
                <button>
                    <ion-icon name="ellipsis-horizontal-outline"></ion-icon>
                </button>
            </a>
        </div>
        <p>{{ $profile['firstName'] }} {{ $profile['lastName'] }}</p>
    </div>
</div>
<br>

<h4>Watched History</h4>
<div class="cards-container">
    @foreach($allHistoriesData as $key => $value)
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

{{ $allHistoriesData->links('vendor.pagination.customPaginate') }}

@endsection
