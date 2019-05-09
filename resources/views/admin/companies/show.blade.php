@extends('layouts.app')

@section('content')
    <!-- <div class='row'>
	<div class="col-md-12 text-center" >
		<h2>Create New Post</h2>
	</div>
</div> -->
<div class="page-heading">
    <h1 class="page-title">Client List Window</h1>
</div>
    <div class="row mt-5">
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
        <div class="ibox-head">
            <div class="ibox-title">{{$company->name}}</div>
            <div class="ibox-tools">
                <a class="ibox-collapse"><i class="fa fa-angle-down"></i></a>
                <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-more-alt"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item"> <i class="ti-pencil"></i>Create</a>
                    <a class="dropdown-item"> <i class="ti-pencil-alt"></i>Edit</a>
                    <a class="dropdown-item"> <i class="ti-close"></i>Remove</a>
                </div>
            </div>
        </div>
        <div class="ibox-body">
            @foreach ($contacts as $contact)
            <div class="box-list">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="font-strong mb-2 mt-2">Name</h5>
                                <p> {{$contact->name}}</p>
                            </div>
                            <div class="col-md-12">
                                <h5 class="font-strong mb-2 mt-2">Mobile</h5>
                                <p> {{$contact->phone_numbers}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="font-strong mb-2 mt-2">Title</h5>
                                <p> {{$contact->title}}</p>
                            </div>
                            <div class="col-md-12">
                                <h5 class="font-strong mb-2 mt-2">Email ID</h5>
                                <p> {{$contact->email_address}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                         <h5 class="font-strong mb-2 mt-2">Notes</h5>
                        <p> {{$contact->notes}}</p>
                    </div>
                </div>
               
            </div>
            @endforeach

            <h3 class="font-strong mb-5">CONTACT INFORMATION

            </h3>
            <div class="row">

                <div class="col-lg-12">
                    <form class="contactForm"  method="POST" action="{{route('contact.store' , $company->id)}}">
                        {{csrf_field()}}
                        <input type="hidden" name="company_id" value="{{$company->id}}">
                        <div class="form-group mb-4">
                            <label for="title">Name</label>
                            <input type="text" required name="name" class="form-control form-control-solid" placeholder="User Name" value="{{$company->name}}" id="title">
                        </div>

                          <div class="row">
                            
                            <div class="col-md-4 form-group">
                                <div class="form-group mb-4">
                                    <label for="Phone Numbers">Phone Numbers</label>
                                    <input type="text" name="phone numbers" class="form-control form-control-solid" placeholder="Phone numbers"  id="phone number">
                                </div>
                            </div>

                            <div class="col-md-4 form-group">
                                <div class="form-group mb-4">
                                    <label for="Phone Numbers">Titles</label>
                                    <input type="text" name="title" class="form-control form-control-solid" placeholder="title"  id="title">
                                </div>
                            </div>

                            <div class="col-md-4 form-group">
                                <div class="form-group mb-4">
                                    <label for="Phone Numbers">Email Address</label>
                                    <input type="text" name="email_address" class="form-control form-control-solid" placeholder="email_id"  id="email_id">
                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                                <div class="form-group mb-4">
                                    <label for="Phone Numbers">Notes</label>
                                    <input type="text" name="notes" class="form-control form-control-solid" placeholder="notes"  id="notes">
                                </div>
                            </div>
                            
                        </div>

                      

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary btn-air mr-2">Add Contact Information</button>
                        </div>
                    </form>
                    <!--  <div class="text-right">
                        <button   class="btn showInfomationForm btn-primary btn-air mr-2">Add Contact Information</button>
                    </div> -->
                </div>
            </div>

        </div>
    </div>

    <div class="ibox">
        <div class="ibox-body">

        </div>
    </div>



@stop



