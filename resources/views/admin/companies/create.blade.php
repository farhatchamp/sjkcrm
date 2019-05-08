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
            <h3 class="font-strong mb-5">ADD NEW COMPANY</h3>
            <div class="row">

                <div class="col-lg-12">
                    <form class=""  method="POST" action="{{route('company.store')}}">
                        {{csrf_field()}}
                        <div class="form-group mb-4">
                            <label for="title">Company Name</label>
                            <input type="text" name="name" class="form-control form-control-solid" placeholder="Company Name" id="title">
                        </div>

                        
                        <div class="row">
                            
                            <div class="col-md-12 form-group">
                                <div class="form-group mb-4">
                                    <label for="Role">Company Owner</label>
                                    <select name="user_id" class="form-control form-control-solid">
                                        @foreach ($roles as $role)
                                            @foreach ($role->users as $user)
                                        <option  value="{{$user->id}}">
                                                {{$user->name}}
                                        </option>
                                            @endforeach
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary btn-air mr-2">Add Company</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



@stop