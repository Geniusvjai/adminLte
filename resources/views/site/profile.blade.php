@extends('site.site-main')

@section('title', 'Shop')

@section('content')

    <!-- Page Header Start -->
    <div class="cars" style="padding: 0 15px">
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
        <div class="container-fluid bg-secondary mb-5">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 180px">
                @if (!empty($CatData))
                    @foreach ($CatData as $cat)
                        <h1 class="font-weight-semi-bold text-uppercase mb-3">
                            {{ $cat->category_name }}
                        </h1>
                    @endforeach
                @else
                    <h1 class="font-weight-semi-bold text-uppercase mb-3"> Profile Update
                    </h1>
                @endif
                <div class="d-inline-flex">
                    <p class="m-0"><a href="">Home</a></p>
                    <p class="m-0 px-2">-</p>
                    <p class="m-0">Profile</p>
                </div>
            </div>
        </div>

        <div class="container">
            <form action="{{ url('/update-site-profile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12 row">
                    <div class="form-group col-md-4 mt-4">
                        <img src="uploads/students/{{ Auth::guard('webs')->user()->avatar }}" alt=""
                            style="width:165px; height:auto;border-radius:50%">

                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="updateName">Update Name</label>
                            <input type="text" id="updateName" name="updateName" class="form-control"
                                value="{{ Auth::guard('webs')->user()->name }}">
                                @if ($errors->has('updateName'))
                                    <div class="text-danger">{{ $errors->first('updateName') }}</div>
                                @endif
                        </div>
                        <div class="form-group">
                            <label for="updateEmail">Update Email</label>
                            <input type="text" id="updateEmail" name="updateEmail" class="form-control"
                                value="{{ Auth::guard('webs')->user()->email }}">
                                @if ($errors->has('updateEmail'))
                                    <div class="text-danger">{{ $errors->first('updateEmail') }}</div>
                                @endif
                        </div>
                        <div class="form-group">
                            <label for="updateProfile">Update Image</label>
                            <input type="file" id="updateProfile" name="updateProfile" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary col-md-4">Submit</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Shop End -->
    @endsection
