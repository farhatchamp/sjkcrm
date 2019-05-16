<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        SJKCRM
    </title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
     <link href="{{ asset('css/login.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
    

        <main class="py-5">
           <div class="container-fluid">
            <div class="row">
          
                        <div class="col-md-3">
                            @if (Auth::check() && Auth::user()->admin )

                            <ul class="list-group">
                                 <li class="list-group-item">
                                    <a href="{{route('home')}}"> <i class="fa fa-home"></i> Home</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{route('video')}}"> <i class="fa fa-video"></i>  Videos</a>
                                </li>
                                 <li class="list-group-item">
                                    <a href="{{route('users')}}"> <i class="fa fa-user"></i>  Users</a>
                                </li>
                                @elseif (Auth::check() )
                                 <li class="list-group-item">
                                    <a href="{{route('showVideos')}}"> <i class="fa fa-video"></i> Video</a>
                                </li>
                                @endif

                               

                            </ul>
                        </div>
            
                
                @if (Auth::check() && Auth::user()->admin)
                <div class="col-md-9 ">
                     @yield('content')
                </div>
                @elseif (Auth::check())
                <div class="col-md-9 ">
                     @yield('content')
                </div>
                @else 
                  <div class="col-md-12 ">
                     @yield('content')
                </div>
                @endif 
                
                
           </div>
           </div>
        </main>
    </div>
    <script src="{{ asset('js/app.js') }}" ></script>

    <script src="{{ asset('js/toastr.min.js') }}" ></script>

     <script type="text/javascript" src="http://cdn.datatables.net/1.10.0/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
    @if(Session::has('success'))
        toastr.success("{{Session::get('success')}}");
    @endif

     @if(Session::has('info'))
        toastr.info("{{Session::get('info')}}");
    @endif

    $(document).ready(function(){
        $('#datatable').DataTable({
         "scrollY":        "350px",
        "scrollCollapse": true,
        "paging":         false
    });
    });
     

    </script>

</body>
</html>
