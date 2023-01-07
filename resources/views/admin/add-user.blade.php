@extends('admin.includes.layout')
@section('title', 'Add User')

@section('content')
    <div class="wrapper">
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
                            <h1>Add User</h1>
                        </div>
                        <div class="col-sm-4">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="">Home</a></li>
                                <li class="breadcrumb-item active">Add User</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="form-horizontal" action="{{ Route('update-users') }}" method="POST" enctype="multipart/form-data">
                                <div class="tab-pane" id="settings">
                                    <div class="col-mr-12 row">
                                        @csrf
                                        <div class="form-group col-md-8">
                                            <label for="user_name" class="col-sm-4 col-form-label">User Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="user_name" class="form-control" id="user_name" placeholder="Enter Full Name" value="{{ old('user_name') }}">
                                                @if ($errors->has('user_name'))
                                                    <div class="text-danger">{{ $errors->first('user_name') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group col-md-8">
                                            <label for="user_email" class="col-sm-4 col-form-label">User Email-Id
                                            </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="user_email" class="form-control" id="user_email" placeholder="Enter Email-Id" value="{{ old('user_email') }}">
                                                @if ($errors->has('user_email'))
                                                    <div class="text-danger">{{ $errors->first('user_email') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group col-md-8">
                                            <label for="user_contact_number" class="col-sm-8 col-form-label">Contact
                                                Number</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="user_contact_number" class="form-control"
                                                    id="user_contact_number" placeholder="Enter Product Long Description" value="{{ old('user_contact_number') }}">
                                                @if ($errors->has('user_contact_number'))
                                                    <div class="text-danger">
                                                        {{ $errors->first('user_contact_number') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group col-md-8">
                                            <label for="user_password" class="col-sm-8 col-form-label">Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" name="password" class="form-control"
                                                    id="user_password" placeholder="Enter password">
                                                @if ($errors->has('password'))
                                                    <div class="text-danger">{{ $errors->first('password') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group col-md-8">
                                            <label for="user_confirm_password" class="col-sm-8 col-form-label">Confirm Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" name="password_confirmation" class="form-control" id="user_confirm_password" placeholder="Enter Product Sale Price">
                                                @if ($errors->has('password_confirmation'))
                                                    <div class="text-danger">{{ $errors->first('password_confirmation') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row col-md-6">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>
    </div>
    </div>
@endsection


@section('script')
    <script>
        $(document).ready(function() {
            $(document).on('change', '#category_name', function() {
                var cate_id = $(this).val();
                // alert(cate_id);

                $.ajax({
                    type: "POST",
                    url: "{{ Route('getdata') }}",
                    data: {
                        cate_id: cate_id,
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        $('#sub_category_name').empty();
                        $('#sub_category_name').append(
                            '<option disabled selected>Select Sub Category</option>' +
                            response);
                    }
                });
            });

        });
    </script>

@endsection
