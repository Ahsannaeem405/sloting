@extends('admin/layout')
@section('content')




<div class="pcoded-main-container">
    <div class="pcoded-wrapper">

        <div class="pcoded-content">
            <!-- Page-header start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Basic Form Inputs</h5>
                                <p class="m-b-0">Lorem Ipsum is simply dummy text of the printing</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.html"> <i class="fa fa-home"></i> </a>
                                </li>
                                <li class="breadcrumb-item"><a href="#!">Form Components</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#!">Basic Form Inputs</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page-header end -->
            <div class="pcoded-inner-content">
                <!-- Main-body start -->
                <div class="main-body">
                    <div class="page-wrapper">

                        <!-- Page body start -->
                        <div class="page-body">

                         <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>User Profile</h5>
                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                    </div>
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Name:</label>
                                            </div>
                                              <div class="col-md-9">
                                                <b>{{Auth::user()->name}}</b>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-md-3">
                                                <label>Email:</label>
                                            </div>
                                              <div class="col-md-9">
                                                <b>{{Auth::user()->email}}</b>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Update Profile</h5>
                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                    </div>
                                    @if(session()->has('message'))
                                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                    {{session('message')}}
                                    @endif
                                        @if(session()->has('error'))
                                        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                        {{session('error')}}  
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                        </button>
                                        </div> 
                                        @endif
                                    <div class="card-block">
                                        <form class="form-material" method="post" action="{{ url('updateProfile') }}">
                                            @csrf
                                            <div class="form-group form-default form-static-label">
                                                <input type="text" value="{{Auth::user()->name}}" name="Name" class="form-control" placeholder="Enter Name">
                           
                                                <span class="form-bar"></span>
                                                <label class="float-label">Name</label>

                                            </div>
                                            <div class="form-group form-default form-static-label">
                                                <input type="email" value="{{Auth::user()->email}}" name="email" class="form-control" placeholder="Enter Email">
                                              <span class="form-bar"></span>
                                                <label class="float-label">Email</label>
                                            </div>
                                            <div class="form-group form-default form-static-label">
                                                <input type="password" name="c_password" class="form-control" placeholder="Enter Password">
                                                <span class="form-bar"></span>
                                                <label class="float-label">Current Password</label>
                                            </div>
                                              <div class="form-group form-default form-static-label">
                                                <input type="password" name="new_password" class="form-control" placeholder="New Password">
                                                 @if ($errors->has('new_password'))
                                                <span class="text-danger">{{ $errors->first('new_password') }}</span>
                                                @endif
                                                <span class="form-bar"></span>
                                                <label class="float-label">New Password</label>
                                            </div>
                                              <div class="form-group form-default form-static-label">
                                                <input type="password" name="confirm_password" class="form-control" placeholder="Password Confirmation">
                                                 @if ($errors->has('confirm_password'))
                                                <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                                                @endif
                                                <span class="form-bar"></span>
                                                <label class="float-label">Password Confirmation</label>
                                            </div>
                                            <button type="submit" name="submit" class="btn btn-primary">
                                                Update Profile
                                            </button>
                                            
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Basic Form Inputs card end -->
                    </div>
                </div>
            </div>
            <!-- Page body end -->
        </div>
    </div>
    <!-- Main-body end -->
    <div id="styleSelector">

    </div>
</div>
</div>
</div>
</div>
</div>
</div>


@endsection
