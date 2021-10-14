<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jasmine</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('imgs/Laravel.svg') }}" />

    <link rel="stylesheet" type="text/css" href="{{ url('css/styles.css') }}">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
    <div class="nav-bar">
        <div class="logo">
            <a href="{{ route('index') }}">
                <ion-icon name="logo-laravel"></ion-icon>
                Jasmine
            </a>
        </div>
        <ul class="nav-links">
            <li class="link">
                <a href="{{ route('index') }}" class="{{ Session::get('activeMenu') === 'home' ? 'active' : '' }}">
                    <ion-icon name="home-outline"></ion-icon>
                    Home
                </a>
            </li>
            <li class="link">
                <a href="{{ route('videoSearch') }}" class="{{ Session::get('activeMenu') === 'search' ? 'active' : '' }}">
                    <ion-icon name="search-outline"></ion-icon>
                    Search
                </a>
            </li>
            <li class="link">
                <a href="{{ route('categoryCardShow') }}" class="{{ Session::get('activeMenu') === 'category' ? 'active' : '' }}">
                    <ion-icon name="grid-outline"></ion-icon>
                    Categories
                </a>
            </li>
            @if( session('token') )
            <li class="link">
                <a href="{{ route('profile.show', session('profileID')) }}" class="{{ Session::get('activeMenu') === 'history' ? 'active' : '' }}">
                    <ion-icon name="time-outline"></ion-icon>
                    History
                </a>
            </li>
            @endif
            <li class="link">
                <a href="{{ route('englishPlayBoxGames', [1,1]) }}" class="{{ Session::get('activeMenu') === 'games' ? 'active' : '' }}">
                    <ion-icon name="game-controller-outline"></ion-icon>
                    English Play Box 1
                </a>
            </li>
            <hr>

            @if( session('is_admin') == '1' )
            <li class="link">
                <a href="{{ route('category.index') }}" class="{{ Session::get('activeMenu') === 'manageCategory' ? 'active' : '' }}">
                    <ion-icon name="add-circle-outline"></ion-icon>
                    Manage Category
                </a>
            </li>
            <li class="link">
                <a href="{{ route('video.index') }}" class="{{ Session::get('activeMenu') === 'manageVideo' ? 'active' : '' }}">
                    <ion-icon name="add-circle-outline"></ion-icon>
                    Manage Video
                </a>
            </li>
            @endif
        </ul>
    </div>

    <div class="content-container">
        <div class="profile-bar">
            <div class="fake-split"></div>
            <div class="dropdown-box">
                <button onclick="myFunction()" class="dropbtn">
                    @if( session('token') )
                    <div class="square">
                        <img src="{{ URL::to('/') }}/image/{{ session('image') }}" alt="profile small" width="50px">
                    </div>
                    {{ session('firstName') }} &nbsp
                    {{ session('lastName') }}
                    @else
                    <div class="square">
                        <img src="{{ URL::to('/') }}/image/default.png" alt="profile small" width="50px">
                    </div>
                    Please Sign In.
                    @endif
                    <ion-icon name="caret-down-outline" class="arrow"></ion-icon>
                </button>
                <div id="myDropdown" class="dropdown-content">
                    @if( session('token') )
                    <a href="{{ route('profile.show', session('profileID')) }}">
                        <ion-icon name="person-circle-outline"></ion-icon>
                        Profile
                    </a>
                    <hr>
                    @endif
                    @if( !session('token') )
                    <a href="{{ url('signIn') }}">
                        <ion-icon name="log-in-outline"></ion-icon>
                        Sign In
                    </a>
                    <a href="{{ url('signUp') }}">
                        <ion-icon name="person-add-outline"></ion-icon>
                        Sign Up
                    </a>
                    @endif
                    @if( session('token') )
                    <a href="{{ route('signOut') }}">
                        <ion-icon name="log-out-outline"></ion-icon>
                        Sign Out
                    </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="content">

            @yield('content')

        </div>
        <div class="footer">
            <ul>
                <li>
                    <a href="https://www.facebook.com/profile.php?id=100008208909771" target="blank">
                        <ion-icon name="logo-facebook"></ion-icon>
                        Facebook
                    </a>
                </li>
                <li>
                    <a href="http://student.crru.ac.th/601463017/" target="blank">
                        <ion-icon name="logo-edge"></ion-icon>
                        Website
                    </a>
                </li>
            </ul>
            <p>This Website Made by Tharathon Tippayasotti 601463017 Computer Science CRRU 2021 With Laravel 8 Framework</p>
        </div>
    </div>

    <script>
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>


    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
