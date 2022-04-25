<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> --}}


    <script src="{{ URL::asset('js/bootstrap.bundle.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <!-- <script type="text/javascript" src="{{ URL::asset('js/jquery-3.6.0.min.min.js') }}"></script>-->
    <meta charset="utf-8">
    <title>Sistemstock</title>
</head>

<body>
    @section('header')
        <div>
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    </center>
                    @auth
                        {{-- style="visibility: hidden;" --}}
                        <a href="{{ url('menu') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Menu</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                    </center>
                </div>
            @endif
        </div>
        <div class="container-fluid p-5 bg-primary text-white text-center">

            <img src="{{ URL::asset('img/horizontal_on_white_by_logaster.png') }}" width="300" height="150">

        </div>
    @show

    <div>
        @yield('content')
    </div>
    <br>
    <br>
    @section('footer')
        <center>
            <h6>SistemStock 2022</h6>
        </center>
    @show

</body>

</html>
