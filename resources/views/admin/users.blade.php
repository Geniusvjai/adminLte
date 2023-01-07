@extends('admin.includes.layout')
@section('title', 'Users')

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
                            <h1>Users Data</h1>
                        </div>
                        <div class="col-sm-4">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ Route('dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Users</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                            <a href="{{ url('/admin/users/add-users') }}" class="btn btn-primary float-right">Add User</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                @foreach ($UserData as $userData)
                                    <tbody>
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $userData->name }}</td>
                                            <td>{{ $userData->email }}</td>
                                            <td>{{ $userData->number }}</td>
                                            <td><input data-id="{{ $userData->id }}" class="toggle-class" 
                                                type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive"
                                                {{ $userData->status ? 'checked' : '' }}
                                                title="If Checked That Means User is Active if uncheck user is not active">
                                            </td>
                                            <td>
                                                <a href="javacript:void(0)" class="UserViewData mr-2" data-toggle="modal" data-target="#viewUser" data-id="{{ $userData->id }}" style="color: #17a2b8"><i class="fa-solid fa-eye"></i></a>

                                                <a href="javascript:void(0)" class="editdata mr-2" data-toggle="modal" data-target="#editUser" style="color: #218838"
                                                data-id="{{ $userData->id }}"><i class="fas fa-edit"></i></a>

                                                <a href="javascript:void(0)" class="deletedata" data-id="{{ $userData->id }}" style="color: #c82333">
                                                <i class="fa-solid fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        </tfoot>
                                @endforeach
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        {{-- add user model --}}
        {{-- <div class="modal fade" id="AddModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="col-md-12">
                                <form id="form_add" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Enter Name" required>
                                        @if ($errors->has('name'))
                                            <div class="text-danger">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="email" id="email" class="form-control"
                                            placeholder="Enter Email-Id" required>
                                        @if ($errors->has('email'))
                                            <div class="text-danger">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="number">Contact Number</label>
                                        <input type="number" name="number" id="number" class="form-control"
                                            placeholder="Enter Contact Number" required>
                                        @if ($errors->has('number'))
                                            <div class="text-danger">{{ $errors->first('number') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control"
                                            placeholder="Enter Password" required>
                                        @if ($errors->has('password'))
                                            <div class="text-danger">{{ $errors->first('password') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Confirm Password</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            class="form-control" placeholder="Enter Confirm Password" required>
                                        @if ($errors->has('password_confirmation'))
                                            <div class="text-danger">{{ $errors->first('password_confirmation') }}</div>
                                        @endif
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" id="add_submit" class="btn btn-primary">Save
                                            changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        {{-- add user model ends --}}

        {{-- edit user model --}}
        <div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">User Edit Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="col-md-12">
                                <form id="edit_form" method="post">
                                    <input type="hidden" name="edit_id" id="edit_id">
                                    @csrf
                                    <div class="form-group">
                                        <label for="edit_name">Name</label>
                                        <input type="text" name="edit_name" id="edit_name" class="form-control"
                                            placeholder="Enter Name" required>
                                        @if ($errors->has('edit_name'))
                                            <div class="text-danger">{{ $errors->first('edit_name') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="edit_email">Email</label>
                                        <input type="email" name="edit_email" id="edit_email" class="form-control"
                                            placeholder="Enter Email-Id" required>
                                        @if ($errors->has('edit_email'))
                                            <div class="text-danger">{{ $errors->first('edit_email') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="edit_number">Contact Number</label>
                                        <input type="number" name="edit_number" id="edit_number" class="form-control"
                                            placeholder="Enter Contact Number" required>
                                        @if ($errors->has('edit_number'))
                                            <div class="text-danger">{{ $errors->first('edit_number') }}</div>
                                        @endif
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary edit_submit">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- edit user model ends --}}

        {{-- view user model --}}
        <div class="modal fade" id="viewUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Users Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="col-md-12">
                                <form id="view_form" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="view_name">Name: </label>
                                        <span id="show_view_name"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="view_email">Email: </label>
                                        <span id="show_view_email"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="view_number">Contact Number: </label>
                                        <span id="show_view_number"></span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- view user model ends --}}
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            // view user modal fetch data  
            $('.UserViewData').click(function(e) {
                var viewId = $(this).attr('data-id');
                $.ajax({
                    type: "POST",
                    url: "{{ url('fetch-data-view-modal') }}",
                    data: {
                        viewId: viewId,
                        "_token": "{{ csrf_token() }}",
                    },
                    dataType: "json",
                    success: function(response) {
                        $('#show_view_name').html(response[0]['name']);
                        $('#show_view_email').html(response[0]['email']);
                        $('#show_view_number').html(response[0]['number']);
                    }
                });
            });

            // edit user modal fetch data 
            $('.editdata').click(function(e) {
                var editId = $(this).attr('data-id');
                $.ajax({
                    type: "POST",
                    url: "{{ url('fetch-data-edit-modal') }}",
                    data: {
                        editId: editId,
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        $('#edit_id').val(response[0]['id']);
                        $('#edit_name').val(response[0]['name']);
                        $('#edit_email').val(response[0]['email']);
                        $('#edit_number').val(response[0]['number']);
                    }
                });
            });

            // edit user modal update data 
            $('.edit_submit').click(function(e) {
                $.ajax({
                    type: "POST",
                    url: "{{ url('update-data') }}",
                    data: $('#edit_form').serialize(),
                    dataType: 'json',
                    success: function(response) {
                        Swal.fire(
                            'Success',
                            response.success,
                            'success'
                        ).then((result) => {
                            location.reload();
                        });
                        // alert(response.success);
                        // location.reload();
                    }
                });
            });

            // delete user data from database and table  
            $('.deletedata').click(function(e) {
                e.preventDefault();
                var deleteId = $(this).attr('data-id');
                // alert(deleteId)
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "{{ url('/delete-data') }}",
                            data: {
                                deleteId: deleteId,
                                "_token": "{{ csrf_token() }}",
                            },
                            dataType: "json",
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire(
                                        'Deleted!',
                                        response.success,
                                        'success'
                                    ).then((result) => {
                                        location.reload();
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: response.fail,
                                    })
                                }
                            }
                        });

                    }
                })

            });

            // change status in database and table
            $('.toggle-class').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var user_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/change-user-status',
                    data: {
                        'status': status,
                        'user_id': user_id
                    },
                    success: function(data) {
                        Swal.fire(
                            'Success',
                            data.success,
                            'success'
                        ).then((result) => {
                            location.reload();
                        });
                    }
                });
            })
        });
    </script>

@endsection
