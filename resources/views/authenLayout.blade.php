<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jasmine</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('imgs/Laravel.svg') }}" />

    <link rel="stylesheet" type="text/css" href="{{ url('css/signIn_signOut_register.css') }}">
</head>

<body>
    <div class="container">
        <div class="logo-header">
            <a href="{{ url('/') }}">
                <ion-icon name="logo-laravel"></ion-icon>
                Jasmine
            </a>
        </div>
        <hr>
        <div class="content-container">
            @yield('content')
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
