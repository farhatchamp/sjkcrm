@extends('layouts.app')

@section('content')
    <!-- <div class='row'>
	<div class="col-md-12 text-center" >
		<h2>Create New Post</h2>
	</div>
</div> -->

    <div class="row">
        <div class="col-md-12">
            @if(count($errors) > 0 )
                <ul class="list-group" style="margin-bottom:20px;">
                    @foreach($errors->all() as $error)
                        <li class="list-group-item text-danger">
                            {{$error}}
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    <div class="ibox">
        <div class="ibox-body">
            <h3 class="font-strong mb-5">EDIT USER</h3>
            <div class="row">

                <div class="col-lg-12">
                    <form class=""  method="POST" action="{{route('user.update' , $user->id)}}">
                        {{csrf_field()}}
                        <div class="form-group mb-4">
                            <label for="title">Name</label>
                            <input type="text" name="name" class="form-control form-control-solid" placeholder="User Name" value="{{$user->name}}" id="title">
                        </div>

                        <div class="row">
                            <div class="col-sm-4 form-group mb-4">
                                <label >Email</label>
                                <input type="email" name="email" class="form-control form-control-solid" value="{{$user->email}}" placeholder="Email">
                            </div>
                            <div class="col-sm-4 form-group mb-4">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control form-control-solid" value="{{$user->password}}" placeholder="Password" id="">
                            </div>
                            <div class="col-sm-4 form-group mb-4">
                                <label for="">Confirm Password</label>
                                <input type="password"  class="form-control form-control-solid" name="password_confirmation" placeholder="Confirm Password" id="">
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary btn-air mr-2">Update User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



@stop