@extends('authenLayout')

@section('content')

<h1>Sign Up</h1>

@if($errors)
@foreach($errors as $error)
<br>
<h4 class="errors">{{ $error }}</h4>
@endforeach
@endif

<br>
<div class="signIn">
    <div class="outSite">
        <form action="{{ route('profile.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-control">
                <label for="input_email">E-Mail</label><br>
                <input type="email" id="input_email" name="input_email" placeholder="Email" required>
            </div>
            <div class="form-control">
                <label for="input_password">Password</label><br>
                <input type="password" id="input_password" name="input_password" placeholder="Password" required maxlength="18">
            </div>
            <div class="form-control">
                <label for="input_conPassword">Password</label><br>
                <input type="password" id="input_conPassword" name="input_conPassword" placeholder="Confirm Password" required maxlength="18">
            </div><br>
            <div class="form-control">
                <div class="form-control-parent">
                    <div class="form-control-child">
                        <label for="input_firstName">First Name</label>
                        <input type="text" id="input_firstName" name="input_firstName" placeholder="First Name" required maxlength="20">
                    </div>
                    <div class="form-control-child">
                        <label for="input_lastName">Last name</label>
                        <input type="text" id="input_lastName" name="input_lastName" placeholder="Last Name" required maxlength="20">
                    </div>
                </div>
            </div>
            <div class="form-control">
                <div class="form-control-parent">
                    <div class="form-control-child">
                        <label for="input_firstName">Gender</label>
                        <select name="genderSelect" id="genderSelect">
                            <option value="0">
                                Male
                            </option>
                            <option value="1">
                                Female
                            </option>
                        </select>
                    </div>
                    <div class="form-control-child">
                        <label for="input_age">Age</label>
                        <input type="number" id="input_age" name="input_age" placeholder="How old are you?" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="3">
                    </div>
                </div>
            </div>
            <div class="form-control">
                <label for="input_phone">Phone Number</label><br>
                <input type="number" id="input_phone" name="input_phone" placeholder="Phone Number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10">
            </div>
            <div class="form-control">
                <label for="input_image">Profile Image</label><br>
                <div class="file-container">
                    <input type="file" id="input_image" name="input_image" accept=".jpg, .png, .jpeg">
                </div>
            </div>
            <br>
            <div class="form-control-submit">
                <button type="submit" class="signUp">Sign Up</button>
            </div>
        </form>
        <br>
        <hr>
        <br>
        <strong>have an account? <a href="{{ url('signIn') }}">SIGN IN</a></strong>
        <br>
    </div>
</div>

@endsection
