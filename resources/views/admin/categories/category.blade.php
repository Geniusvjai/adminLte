@extends('admin.includes.layout')
@section('title', 'Category')


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
                            <h1>Category Data</h1>
                        </div>
                        <div class="col-sm-4">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ Route('dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Category</li>
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
                            <a href="{{ url('/admin/category/add-category') }}" class="btn btn-primary float-right">Add
                                Category</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                @foreach ($CategoryData as $userData)
                                    <tbody>
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $userData->category_name }}</td>
                                            <td>
                                                <input data-id="{{ $userData->id }}" class="toggle-class" type="checkbox"
                                                    data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                                    data-on="Active" data-off="InActive"
                                                    {{ $userData->status ? 'checked' : '' }}
                                                    title="If Checked That Means User is Active if uncheck user is not active">
                                            </td>
                                            <td>
                                                <a href="" class="viewdata mr-2" data-toggle="modal"
                                                    data-target="#viewCategory" data-id="{{ $userData->id }}"
                                                    style="color: #17a2b8"><i class="fa-solid fa-eye"></i></a>

                                                <a href="{{ url('admin/category/edit-category/' . $userData->id) }}"
                                                    data-id=" {{ $userData->id }}" style="color: #218838" class="mr-2"><i
                                                        class="fas fa-edit"></i></a>

                                                <a href="javascript:void(0)" class="deletedata"
                                                    data-id="{{ $userData->id }}" style="color: #c82333"><i
                                                        class="fa-solid fa-trash"></i></a>
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
        {{-- view user model --}}
        <div class="modal fade" id="viewCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Category Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="col-md-12">
                                <form id="view_form">
                                    @csrf
                                    <div class="form-group">
                                        <label for="view_category_name">Category Name: </label>
                                        <span id="view_category_name"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="view_category_slug">Category Slug: </label>
                                        <span id="view_category_slug"></span>
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
        // view modal of category 
        $('.viewdata').click(function(e) {
            e.preventDefault();
            var viewId = $(this).attr('data-id');
            // alert(viewId)
            $.ajax({
                type: "POST",
                url: "{{ url('view-category') }}",
                data: {
                    viewId: viewId,
                    "_token": "{{ csrf_token() }}",
                },
                // dataType: "json",
                success: function(response) {
                    console.log(response);
                    $('#view_category_name').html(response[0]['category_name'])
                    $('#view_category_slug').html(response[0]['category_slug'])
                }
            });
        });

        // category status change 
        $('.toggle-class').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var user_id = $(this).data('id');

            $.ajax({
                type: "POST",
                dataType: "json",
                url: '/change-category-status',
                data: {
                    'status': status,
                    'user_id': user_id,
                    "_token": "{{ csrf_token() }}",
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

        // category delete data 
        $('.deletedata').click(function(e) {
            e.preventDefault();

            var deleteId = $(this).attr('data-id');
            alert(deleteId)

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
                        url: "/delete-category",
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
                            // document.location.reload();
                        }
                    });

                }
            })

        });
    </script>
@endsection
