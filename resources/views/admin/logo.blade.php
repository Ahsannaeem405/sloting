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
                                <h5 class="m-b-10">View Logo</h5>
                            
                            </div>
                        </div>
                        <div class="col-md-4">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/admin"> <i class="fa fa-home"></i> </a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">View</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Logo</a>
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

                            <div class="card">
                                <div class="card-header">
                                    <a href="{{url('admin/addLogo')}}" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Add Logo</a>

                                </div>
                                @if(session()->has('message'))
                                <div class="alert alert-success col-md-4 offset-md-3 mt-3" role="alert">
                                    {{session('message')}}
                                </div>
                                @endif
                                <div class="card-block table-border-style">
                                    <div class="table-responsive">
                                        <table class="table table-hover" id="myTable">
                                            <thead>
                                                <tr>
                                                    <th width="10">#</th>
                                                    <th width="50">Name</th>
                                                    <th width="40">Image</th>
                                                    <th width="10">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                @foreach($logo as $list)
                                <tr>
                                    <th scope="row">{{$list->id}}</th>
                                    <td>{{$list->name}}</td>
                                    <td><img src="{{asset('admin_asset/images')}}/{{$list->image}}" width="60" height="60"></td>
                                    <td>
                                        <a data-toggle="modal" data-target="#updateModal{{$list->id}}" href="{{url('/logoUpdate')}}/{{$list->id}}" class="btn btn-primary btn-sm">Update</a>
                                        
                                    </td>
                                </tr>
                                <div class="modal" id="updateModal{{$list->id}}">
                                  <div class="modal-dialog">
                                    <div class="modal-content">

                                      <!-- Modal Header -->
                                      <div class="modal-header">
                                        <h4 class="modal-title">Add Logo</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form method="POST" action="{{url('admin/logoUpdate')}}/{{$list->id}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="name" value="{{$list->name}}" class="form-control">
                                                    
                                                </div>

                                            </div>
                                      
                                                   <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Image</label>
                                                <div class="col-sm-10">
                                                    <input type="file" name="image" class="form-control">
                                                    <img src="{{asset('admin_asset/images')}}/{{$list->image}}" width="60" height="60">
                                                    @if ($errors->has('image'))
                                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <center>
                                             <div class="form-group">
                                                <button type="submit" name="submit" class="col-md-3 btn btn-success btn-block">Update</button>
                                            </div>
                                        </center>
                                    </form>
                                </div>
                                </div>
                                </div>
                                </div>
                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
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


<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Assets</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>

    <!-- Modal body -->
    <div class="modal-body">
        <form method="POST" action="{{url('admin/addLogo')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control">
                    @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>

            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10">
                    <input type="file" name="image" class="form-control">
                    @if ($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                    @endif
                </div>
            </div>
            <center>
             <div class="form-group">
                <button type="submit" name="submit" class="col-md-3 btn btn-success btn-block">Submit</button>
            </div>
        </center>

    </form>
</div>


</div>
</div>
</div>
<!-- The Modal -->
@endsection
