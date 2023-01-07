@extends('admin.includes.layout')
@section('title', 'Profile')


@section('content')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-8">
                            @if (Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ Session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @elseif (Session::has('fail'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ Session('fail') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <h1>Profile</h1>
                        </div>
                        <div class="col-sm-4">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">User Profile</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">

                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="uploads/students/{{ Auth::guard('admin')->user()->image }}"
                                            alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center">
                                        {{ Auth::guard('admin')->user()->name }}</h3>

                                    <p class="text-muted text-center">Admin</p>

                                    {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->


                        </div>
                        <!-- /.col -->
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item"><a class="nav-link active" href="#settings"
                                                data-toggle="tab">Profile Update</a>
                                        <li class="nav-item"><a class="nav-link" href="#changepass"
                                                data-toggle="tab">Change Password</a>
                                        </li>
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <!-- /.tab-pane -->
                                        <div class="tab-pane active" id="settings">
                                            <form class="form-horizontal" action="{{ Route('update-profile') }}"
                                                method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group row">
                                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="name" class="form-control"
                                                            id="name" placeholder="Name"
                                                            value="{{ Auth::guard('admin')->user()->name }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" name="email" class="form-control"
                                                            id="email" placeholder="Email"
                                                            value="{{ Auth::guard('admin')->user()->email }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="number" class="col-sm-2 col-form-label">Number</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="number" class="form-control"
                                                            id="number" placeholder="Contact Number"
                                                            value="{{ Auth::guard('admin')->user()->number }}">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="image" class="col-sm-2 col-form-label">Image</label>
                                                    <div class="col-sm-10">
                                                        <input type="file" name="image" class="form-control"
                                                            id="image">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <button type="submit" class="btn btn-danger">Update
                                                            Profile</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        {{-- update password form starts --}}
                                        <div class="tab-pane" id="changepass">
                                            <form class="form-horizontal" action="{{ Route('update-password') }}"
                                                method="post">
                                                @csrf
                                                <div class="form-group row">
                                                    <label for="password" class="col-sm-2 col-form-label">New
                                                        Password</label>
                                                    <div class="col-sm-6">
                                                        <input type="password" name="password" class="form-control"
                                                            id="password" placeholder="New Password">
                                                            @if ($errors->has('password'))
                                                                <div class="text-danger">{{ $errors->first('password') }}</div>
                                                            @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="password_confirmation"
                                                        class="col-sm-2 col-form-label">Confirm New Password</label>
                                                    <div class="col-sm-6">
                                                        <input type="password" name="password_confirmation"
                                                            class="form-control" id="password_confirmation"
                                                            placeholder="Confirm New Password">
                                                            @if ($errors->has('password_confirmation'))
                                                                <div class="text-danger">{{ $errors->first('password_confirmation') }}</div>
                                                            @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <button type="submit" class="btn btn-danger">
                                                            Update Password</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                    <!-- /.tab-content -->
                                </div><!-- /.card-body -->
                            </div>
                            <!-- /.nav-tabs-custom -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
@endsection
