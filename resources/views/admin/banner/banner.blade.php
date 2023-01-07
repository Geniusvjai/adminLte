@extends('admin.includes.layout')
@section('title', 'Banner')

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
                            <h1>Banner Data</h1>
                        </div>
                        <div class="col-sm-4">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ Route('dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Banner</li>
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
                            <a href="{{ url('/admin/banner/add-banner') }}" class="btn btn-primary float-right">Add
                                Product</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Banner Title</th>
                                        <th>Banner Description</th>
                                        <th>Banner Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @if ($BannerData != '')
                                    @foreach ($BannerData as $product)
                                        <tbody>
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="text-center">{{ $product->banner_title }}</td>
                                                <td class="text-center">{{ $product->banner_description }}</td>
                                                <td><a href="{{ asset('uploads/banner/' . $product->banner_image) }}"><img
                                                            src="{{ asset('uploads/banner/' . $product->banner_image) }}"
                                                            alt="" width="100px"></a> </td>

                                                <td class="text-center">
                                                    <input data-id="{{ $product['id'] }}" class="toggle-class"
                                                        type="checkbox" data-onstyle="success" data-offstyle="danger"
                                                        data-toggle="toggle" data-on="Active" data-off="InActive"
                                                        {{ $product['status'] ? 'checked' : '' }}
                                                        title="Checked: Active And Unchecked: InActive">
                                                </td>

                                                <td class="text-center">
                                                    <a href="javacript:void(0)" class="viewbanner mr-2" data-toggle="modal"
                                                        data-target="#viewBanner" data-id="{{ $product['id'] }}"
                                                        style="color: #17a2b8"><i class="fa-solid fa-eye"></i></a>

                                                    <a href="{{ url('/admin/banner/edit-banner/' . $product['id']) }}"
                                                        class="editdata mr-2" style="color: #218838">
                                                        <i class="fas fa-edit"></i></a>

                                                    <a href="javascript:void(0)" class="bannerdeletedata" style="color:#c82333" data-id="{{ $product['id'] }}"><i
                                                            class="fa-solid fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                @endif
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

        {{-- view user model --}}
        <div class="modal fade" id="viewBanner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog lg-modal" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">WebSite Banner</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="col-md-12">
                                @csrf

                                <div class="form-group">
                                    <label for="view_banner_title">Banner Title: </label>
                                    <span id="view_banner_title"></span>
                                </div>

                                <div class="form-group">
                                    <label for="view_banner_description">Banner Description: </label>
                                    <span id="view_banner_description"></span>
                                </div>

                                <div class="form-group">
                                    <label for="view_banner_image">Banner image: </label>
                                    <img src="" alt="" id="view_banner_image" width="120px">
                                    {{-- <span id="view_product_title"></span> --}}
                                </div>

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
        $('.viewbanner').click(function(e) {
            e.preventDefault();
            var viewId = $(this).attr('data-id');
            $.ajax({
                type: "POST",
                url: "{{ url('/admin/banner/view-banner') }}",
                data: {
                    viewId: viewId,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(response) {

                    $('#view_banner_title').html(response[0]['banner_title'])
                    $('#view_banner_description').html(response[0]['banner_description'])
                    $('#view_banner_image').attr('src', 'http://127.0.0.1:8000/uploads/banner/' +
                        response[0]['banner_image'])
                }
            });
        });

        // product status change    
        $('.toggle-class').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var user_id = $(this).data('id');
            // alert(status)
            // alert(user_id)

            $.ajax({
                type: "POST",
                dataType: "json",
                url: '/admin/banner/change-status',
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


        $('.bannerdeletedata').click(function(e) {
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
                        url: "/admin/banner/banner-data-delete",
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
