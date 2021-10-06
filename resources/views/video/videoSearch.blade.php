@extends('layout')

@section('content')


<div class="search-container">
    <h4>Search</h4>
    <form action=" {{ route('videoSearchKeyword') }} ">
        <input type="text" id="input_keyword" name="input_keyword" placeholder="Video Title, Video Description" maxlength="50">
        <button>
            <ion-icon name="search-outline"></ion-icon>
        </button>
    </form>
</div>

<div class="cards-container">
    @if(count($videos) > 0)
        @foreach($videos as $key => $value)
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
    @else
    <h4>Not Found any result that match keyword '' {{ $keyword }} ''</h4>
    @endif
</div>

{{ $videos->links('vendor.pagination.customPaginate') }}

@endsection
