@extends('layouts.app')

@section('content')

  
   


  <div class="">
        <!-- START HEADER-->
     
        <!-- END HEADER-->
   <!--      <div class="wrapper content-wrapper">
             START PAGE CONTENT
            <div class="page-content fade-in-up"> -->
                <div class="row mb-4">
                    <div class="col-lg-4 col-md-6">
                        <div class="card mb-4">
                            <div class="card-body flexbox-b">
                                <div class="easypie mr-4" data-percent="{{$companies_count}}" data-bar-color="#18C5A9" data-size="80" data-line-width="8">
                                    <span class="easypie-data text-success" style="font-size:28px;"><i class="far fa-building"></i></span>
                                </div>
                                <div>
                                    <h3 class="font-strong text-success">{{$companies_count}}</h3>
                                    <div class="text-muted">TOTAL COMPANIES</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card mb-4">
                            <div class="card-body flexbox-b">
                                <div class="easypie mr-4" data-percent="{{$users_count}}" data-bar-color="#5c6bc0" data-size="80" data-line-width="8">
                                    <span class="easypie-data text-primary" style="font-size:32px;"><i class="fa fa-users"></i></span>
                                </div>
                                <div>
                                    <h3 class="font-strong text-primary"> {{$users_count}}</h3>
                                    <div class="text-muted">TOTAL USERS</div>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
              
          <!--   </div>
             END PAGE CONTENT
        
        </div> -->
    </div>
    <!-- START SEARCH PANEL-->


   




@endsection
