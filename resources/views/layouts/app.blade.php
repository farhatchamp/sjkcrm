<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
   <!--  <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"> -->

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

      <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body class="boxed-layout">
    <div id="app" >
       <header class="header">
            <div class="header-topbar">
                <div class="wrapper d-flex">
                    <div class="page-brand">
                        <a class="link" href="/">
                            <span class="brand"> SJK<span class="brand-tip">CRM</span>
                            </span>
                        </a>
                    </div>
                    <div class="d-flex justify-content-between align-items-center flex-1">
                        <!-- START TOP-LEFT TOOLBAR-->
                        <ul class="nav navbar-toolbar">
                            <li>
                                <a class="nav-link sidebar-toggler js-sidebar-toggler" href="javascript:;">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </a>
                            </li>
                            <li>
                                <a class=""></i>
                                    <span></span>
                                </a>
                            </li>
                        </ul>
                        <!-- END TOP-LEFT TOOLBAR-->
                        <!-- START TOP-RIGHT TOOLBAR-->
                        <ul class="nav navbar-toolbar">
                            <li class="timeout-toggler">
                                <a class="nav-link toolbar-icon" data-toggle="modal" data-target="#session-dialog" href="javascript:;"><i class="ti-alarm-clock timeout-toggler-icon rel"><span class="notify-signal"></span></i></a>
                            </li>
                           @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                          
                            <li>
                                <a class="nav-link quick-sidebar-toggler">
                                    <span class="ti-align-right"></span>
                                </a>
                            </li>
                        </ul>
                        <!-- END TOP-RIGHT TOOLBAR-->
                        <!-- START SEARCH PANEL-->
                    </div>
                </div>
            </div>
            <div class="top-navbar">
                <div class="wrapper" id="navbar-wrapper">
                    <ul class="nav-menu">
                           @if (Auth::check() && Auth::user()->admin )
                                <li class="nav-item {{ Request::path() == 'admin/home' ? 'active' : '' }}">
                                    <a class="nav-link" href="{{route('home')}}"> <i class="fa fa-home"></i> Dashboard</a>
                                </li>
                              
                                 <li class="nav-item {{ Request::path() == 'admin/users' ? 'active' : '' }}">
                                    <a class="nav-link" href="{{route('users')}}"> <i class="fa fa-user"></i>  Users</a>
                                </li>
                              @elseif (Auth::check() )
                              
                            @endif
                      
                    </ul>
                </div>
            </div>
        </header>

     

         <main class="py-4">
            <div class="row">
          
           
            
                
                @if (Auth::check() )
                <div class="col-md-12 ">
                    <div class="wrapper content-wrapper">
                        <div class="page-content fade-in-up" >
                            <div class='yield-holder' style="    min-height: 500px;">
                            @yield('content')
                             </div>
                               <footer class="page-footer">
                                    <div class="font-13">2019 © <b>SJKCRM</b> </div>
                                 
                                </footer>
                               
                         </div>
                     </div>
                </div>
             
                @endif 
                
                
           </div>
          
        </main>
    </div>

     <script src="{{ asset('js/app.js') }}" ></script>

    <script src="{{ asset('js/toastr.min.js') }}" ></script>
     <script type="text/javascript" src="{{asset('js/jquery.easypiechart.min.js')}}"></script>
     <script src="{{ asset('js/app.min.js') }}" ></script>


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
        // $('.contactForm').hide();
        // $('.showInfomationForm').click(function(){
        //     // alert('hi')
        //     $(this).parent().siblings('form').show();
        //     $(this).hide();
        //     $(this).parents('.ibox-body').find('.box-list').hide();
        // });

      $(function() {
            $('#products-table').DataTable({
                pageLength: 10,
                fixedHeader: true,
                responsive: true,
                "sDom": 'rtip',
            });
            var table = $('#products-table').DataTable();
            $('#key-search').on('keyup', function() {
                table.search(this.value).draw();
            });
            $('#type-filter').on('change', function() {
                table.column(2).search($(this).val()).draw();
            });
        });
         $('.easypie').each(function(){
        $(this).easyPieChart({
          trackColor: $(this).attr('data-trackColor') || '#f2f2f2',
          scaleColor: false,
        });
    }); 
    });
     

    </script>


</body>
</html>
