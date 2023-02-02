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

<div class="container mt-5">
   <div class="row">
       <div class="col">
           @if(session('success'))
               <div class="alert alert-fly alert-success alert-dismissible fade show col-lg-6 col-md-12 mx-auto">
                   {{ session('success') }}
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>

           @endif
               @if(session('info'))
                   <div class="alert alert-light text-center" role="alert">
                       {{session('info')}}
                       <br>
                       <a href="{{route('profile.edit')}}">Complete Profile</a>
                   </div>
               @endif
       </div>
   </div>
</div>

@yield('content')

@include('frontend.layouts.footer')

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@yield('js')

<script type="text/javascript">
    var route = "{{ url('search') }}";
    $('#search').typeahead({
        source: function (query, process) {
            return $.get(route, {
                query: query
            }, function (data) {
                return process(data);
            });
        }
    });
</script>

<script type="text/javascript">

    $(document).ready(function () {

        window.setTimeout(function() {
            $(".alert-fly").fadeTo(1000, 0).slideUp(1000, function(){
                $(this).remove();
            });
        }, 1500);

    });
</script>

</body>

</html>
