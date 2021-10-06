@extends('layout')

@section('content')

<div class="add-container">
    <h2>Manage Video</h2>
    <a href="{{ route('video.create') }}">Upload Video</a>
    @if($message = Session::get('success'))
    <p style="margin-left: 20px; color: #03af00;">{{ $message }}</p>
    @endif
    @if($message = Session::get('errors'))
    <p style="margin-left: 20px; color: rgb(168, 0, 0);">{{ $message }}</p>
    @endif
</div>
<br>
<table class="manage-video">
    <tr>
        <th width="100px">Video ID</th>
        <th>Video Name</th>
        <th width="300px">Video Description</th>
        <th>Category ID</th>
        <th>Category Name</th>
        <th>Created Date</th>
        <th>Updated Date</th>
        <th width="200px">Action</th>
    </tr>
    @foreach ($videos as $key => $value)
    <tr>
        <td>{{ $value->videoID }}</td>
        <td>{{ Str::limit($value->videoName, 30)}}</td>
        <td class="description">{{ Str::limit($value->videoDescription, 40)}}</td>
        <td>{{ $value->categoryID}}</td>
        <td>{{ $value->categoryName}}</td>
        <td>{{ $value->created_at}}</td>
        <td>{{ $value->updated_at}}</td>
        <td>
            <form action="{{ route('video.destroy', $value->videoID) }}" method="post">
                <a href="{{ route('video.edit', $value->videoID) }}" class="btnEdit">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Confirm to Delete?')">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{{ $videos->links('vendor.pagination.customPaginate') }}

@endsection
