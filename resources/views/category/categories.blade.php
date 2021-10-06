@extends('layout')

@section('content')

<div class="add-container">
    <h2>Manage Category</h2>
    <a href="{{ route('category.create') }}">Add Category</a>
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
        <th width="120px">Category ID</th>
        <th width="500px">Category Name</th>
        <th>Created Date</th>
        <th>Updated Date</th>
        <th width="200px">Action</th>
    </tr>
    @foreach ($categories as $key => $value)
    <tr>
        <td>{{ $value->categoryID }}</td>
        <td class="description">{{ Str::limit($value->categoryName, 50) }}</td>
        <td>{{ $value->created_at }}</td>
        <td>{{ $value->updated_at }}</td>
        <td>
            <form action="{{ route('category.destroy', $value->categoryID) }}" method="post">
                <a href="{{ route('category.edit', $value->categoryID) }}" class="btnEdit">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Confirm to Delete?')">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
<br>

{{ $categories->links('vendor.pagination.customPaginate') }}

@endsection
