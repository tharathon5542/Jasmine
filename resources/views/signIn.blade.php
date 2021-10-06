@extends('authenLayout')

@section('content')

<p>To continue, Login to Jasmine</p>
@if($errors)
@foreach($errors as $error)
<br>
<h4 class="errors">{{ $error }}</h4>
@endforeach
@endif
<br>
<div class="signIn">
    <div class="outSite">
        <!-- <button class="google">
            <ion-icon name="logo-google"></ion-icon>
            CONTINUE WITH GOOGLE
        </button>
        <br>
        <p>OR</p> -->
        <form action="user" method="post">
            @csrf
            <div class="form-control">
                <label for="input_email">What is your E-mail?</label><br>
                <input type="email" id="input_email" name="input_email" placeholder="Your E-mail here.">
            </div>
            <div class="form-control">
                <label for="input_password">and your Password is?</label><br>
                <input type="password" id="input_password" name="input_password" placeholder="Your Password here.">
            </div>
            <div class="form-control-submit">
                <button class="signIn">LOG IN</button>
            </div>
        </form>
        <br>
        <hr>
        <br>
        <strong>Don't have an account?</strong>
        <br>
        <a href="{{ url('signUp') }}" class="signUp">SIGN UP FOR JASMINE</a>
    </div>
</div>


@endsection
