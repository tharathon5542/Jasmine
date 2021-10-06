@extends('layout')


@section('content')

<h4>Category All</h4>

<div class="cards-container">
    @foreach($categories as $key => $value)
    <a href=" {{ route('videoByCategory', $value->categoryID) }} ">
        <div class="card-category">

            <div class="card-content">
                <h4><b>{{ Str::limit($value->categoryName,15) }}</b></h4>
            </div>

        </div>
    </a>
    @endforeach
</div>

@endsection
