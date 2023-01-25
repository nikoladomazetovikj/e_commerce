<!DOCTYPE html>
<html data-bs-theme="dark">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8" />
    <meta name="keywords" content="brainster preneurs, Brainster Preneurs, brainster" />
    <meta name="description" content= "TBD" />
    <meta name="author" content="Nikola Domazetovikj, Andrea Bilbilovska, Emilija Ristovska" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @yield('meta')
    <!-- Latest compiled and minified Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>

<body>
@include('frontend.layouts.navbar')

@yield('content')

@include('frontend.layouts.footer')

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@yield('js')

</body>

</html>
