<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery-3.6.0.min.min.js"></script>
    <meta charset="utf-8">
    <title>Laravel</title>
</head>
<body>
    @section('header')
    <div class="container-fluid p-5 bg-primary text-white text-center">

    <img src="{{URL::asset('img/horizontal_on_white_by_logaster.png')}}" width="300" height="150">

    </div>
    @show

<div>
    @yield('content')
</div>
<br>
<br>
    @section('footer')
        <center>
            <h6>Guillermo-Ricardo-Paula</h6>
        </center>    
    @show

</body>
</html>