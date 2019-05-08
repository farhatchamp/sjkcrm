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
                <ul class="list-group">
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
            <h3 class="font-strong mb-4">COMPANIES LIST</h3>
            <div class="flexbox mb-4">
                <div class="flexbox">
                    <!--  <label class="mb-0 mr-2">Type:</label>
                     <select class="selectpicker show-tick form-control" id="type-filter" title="Please select" data-style="btn-solid" data-width="150px">
                         <option value="">All</option>
                         <optgroup label="Electronics">
                             <option>TV & Video</option>
                             <option>Cameras & Photo</option>
                             <option>Computers & Tablets</option>
                         </optgroup>
                         <optgroup label="Fashion">
                             <option>Health & Beauty</option>
                             <option>Shoes</option>
                             <option>Handbags & Purses</option>
                             <option>Jewelry and Watches</option>
                         </optgroup>
                     </select> -->
                    <div class="input-group-icon input-group-icon-left mr-3">
                        <span class="input-icon input-icon-right font-16"><i class="fa fa-search"></i></span>
                        <input class="form-control form-control-rounded form-control-solid" id="key-search" type="text" placeholder="Search ...">
                    </div>
                </div>
                <div class="flexbox">
                    {{--<a class="btn btn-rounded btn-info btn-air" href="{{route('import-user')}}">  Import User</a>--}}

                    <a class="btn ml-3  btn-rounded btn-primary btn-air" href="{{route('company.create')}}"> <i class="fa fa-plus"></i> Add Company</a>
                </div>
            </div>
            <div class="table-responsive ">
                <table class="table table-bordered table-hover" id="products-table">
                    <thead class="thead-default thead-lg">

                    <tr>
                        <th>Name</th>
                       <th>Owner</th>
                       
                        <th>
                            Actions
                        </th>

                    </tr>
                    </thead>

                    <tbody>
                    @if ($companies->count() > 0)
                        @foreach($companies as $company)
                            <tr>
                                <td>{{$company->name}}</td>
                                <td>{{$company->user->name}}</td>
                               
                                <td>
                                    <a href="{{route('company.delete' , $company->id)}}"><i class=" fa fa-trash"></i></a>
                                    <a href="{{route('company.edit' , $company->id)}}"><i class=" fa fa-edit"></i></a>
                                </td>
                            </tr>

                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>

        </div>
    </div>



    <div class="row" style="margin-top:15px;">
        <div class="col-md-12 text-center">
            {{$companies->links()}}
        </div>
    </div>

@stop