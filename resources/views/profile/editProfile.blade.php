@extends('layout')

@section('content')

<form action="{{ route('profile.update', $profile['profileID']) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="profile-header">
        <div class="profile-image">
            <label for="input_image">
                <img id="profileImage" src="{{ URL::to('/') }}/image/{{ $profile['image'] }}" alt="profileImage" width="500px">
            </label>
            <input id="input_image" name="input_image" accept=".jpg, .png, .jpeg" type="file" onchange="document.getElementById('profileImage').src = window.URL.createObjectURL(this.files[0])" />
        </div>
        <div class="profile-name">
            <div class="profile-name-edit">
                <h3>Edit Profile</h3>
            </div>
            <a href="{{ route('profile.show', $profile['profileID']) }}">
                <p>{{ $profile['firstName'] }} {{ $profile['lastName'] }}</p>
            </a>
        </div>
    </div>
    <br>
    <div class="edit-container">
        @if($message = Session::get('success'))
        <p class="alert">{{ $message }}</p>
        <br>
        @endif
        <div class="my-form-control">
            <div class="form-control-child">
                <label for="input_firstName">First Name</label><br>
                <input style="width: 300px;" type="text" id="input_firstName" name="input_firstName" placeholder="First Name" value="{{ $profile['firstName'] }}" required maxlength="20">
            </div>
            <div class="form-control-child">
                <label for="input_lastName">Last Name</label><br>
                <input style="width: 300px;" type="text" id="input_lastName" name="input_lastName" placeholder="Last Name" value="{{ $profile['lastName'] }}" required maxlength="20">
            </div>
        </div>
        <div class="my-form-control">
            <div class="form-control-child">
                <label for="input_firstName">Gender</label><br>
                <select name="genderSelect" id="genderSelect" style="width: 300px;">
                    <option value="0" {{ $profile['gender'] === 0 ? "selected" : ""  }}>
                        Male
                    </option>
                    <option value="1" {{ $profile['gender'] === 1 ? "selected" : ""  }}>
                        Female
                    </option>
                </select>
            </div>
            <div class="form-control-child">
                <label for="input_age">Age</label><br>
                <input style="width: 300px;" type="number" id="input_age" name="input_age" placeholder="Age" value="{{ $profile['age'] }}" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="3">
            </div>
        </div>
        <div class="my-form-control">
            <div class="form-control-child">
                <label for="input_email">E-mail</label><br>
                <input style="width: 300px;" type="email" id="input_email" name="input_email" placeholder="E-mail" value="{{ $profile['email'] }}" required disabled>
            </div>
            <div class="form-control-child">
                <label for="input_phone">Phone Number</label><br>
                <input style="width: 300px;" type="number" id="input_phone" name="input_phone" placeholder="Phone Number" value="{{ $profile['phoneNumber'] }}" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10">
            </div>
        </div>
        <div class="form-control-submit">
            <button type="submit">Edit Profile</button>
            <a href=" {{ route('profile.show',  $profile['profileID']) }} ">Back</a>
        </div>
    </div>
</form>


@endsection
