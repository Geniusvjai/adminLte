@extends('admin.includes.layout')
@section('title', 'Products')

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
                            <h1>Sub Category Data</h1>
                        </div>
                        <div class="col-sm-4">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ Route('dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Sub Category</li>
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
                            <a href="{{ url('/admin/product/add-product') }}" class="btn btn-primary float-right">Add
                                Product</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category Name</th>
                                        <th>Sub Category Name</th>
                                        <th>Product Title</th>
                                        <th>Product Regular Price</th>
                                        <th>Product Sale Price</th>
                                        <th>Product Image</th>
                                        <th>Product Gallary Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @if ($Productdata != '')
                                    @foreach ($Productdata as $product)
                                        <tbody>
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="text-center">{{ $product['category']['category_name'] }}</td>
                                                <td class="text-center">{{ $product['sub_category']['sub_category_name'] }}
                                                </td>
                                                <td class="text-center">{{ $product['title'] }}</td>
                                                <td class="text-center">{{ $product['regular_price'] }}</td>
                                                <td class="text-center">{{ $product['sale_price'] }}</td>
                                                <td><a href="{{ asset('uploads/addProduct/' . $product['image']) }}"> 
                                                <img src="{{ asset('uploads/addProduct/' . $product['image']) }}"
                                                alt="" width="100px"> </a></td>

                                                <td class="text-center"><a href="javascript:void(0)" class="viewGallary"
                                                        data-toggle="modal" data-target="#viewGallary"
                                                        data-id="{{ $product['id'] }}" style="color: #17a2b8"><i
                                                            class="fa-solid fa-eye"></i></td></a>

                                                <td class="text-center">
                                                    <input data-id="{{ $product['id'] }}" class="toggle-class"
                                                        type="checkbox" data-onstyle="success" data-offstyle="danger"
                                                        data-toggle="toggle" data-on="Active" data-off="InActive"
                                                        {{ $product['status'] ? 'checked' : '' }}
                                                        title="Checked: Active And Unchecked: InActive">
                                                </td>
                                                <td class="text-center">
                                                    <a href="javacript:void(0)" class="viewdata mr-1" data-toggle="modal"
                                                        data-target="#viewProduct" data-id="{{ $product['id'] }}"
                                                        style="color: #17a2b8"><i class="fa-solid fa-eye"></i></a>

                                                    <a href="{{ url('/admin/product/edit-product/' . $product['id']) }}"
                                                        class="editdata mr-1" style="color: #218838"><i class="fas fa-edit"></i></a>

                                                     <a href="javascript:void(0)" class="deletedata"
                                                    data-id="{{ $product['id'] }}" style="color: #c82333"><i
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
        <div class="modal fade" id="viewProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog lg-modal" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Product Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="col-md-12">
                                @csrf

                                <div class="form-group">
                                    <label for="view_product_category_name">Category Name: </label>
                                    <span id="view_product_category_name"></span>
                                </div>

                                <div class="form-group">
                                    <label for="view_product_sub_category_name">Sub Category Name: </label>
                                    <span id="view_product_sub_category_name"></span>
                                </div>

                                <div class="form-group">
                                    <label for="view_product_title">Product Title: </label>
                                    <span id="view_product_title"></span>
                                </div>

                                <div class="form-group">
                                    <label for="view_product_description">Product Description: </label>
                                    <span id="view_product_description"></span>
                                </div>

                                <div class="form-group">
                                    <label for="view_product_long_description">Product Long Description: </label>
                                    <span id="view_product_long_description"></span>
                                </div>

                                <div class="form-group">
                                    <label for="view_product_regular_price">Product Regular Price: </label>
                                    <span id="view_product_regular_price"></span>
                                </div>

                                <div class="form-group">
                                    <label for="view_product_sale_price">Product Sale Price: </label>
                                    <span id="view_product_sale_price"></span>
                                </div>

                                <div class="form-group">
                                    <label for="view_product_image">Product Image: </label>
                                    <img src="" alt="" id="view_product_image" width="120px">
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


        {{-- view gallary images --}}
        <div class="modal fade" id="viewGallary" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Product Gallary Images:</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="view_category_name"> </label><br>
                                    <div id="viewGallaryImages">
                                    </div>
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
        {{-- view gallary images ends --}}

    </div>
@endsection

@section('script')

    <script>
        // view modal of product 
        $('.viewdata').click(function(e) {
            e.preventDefault();
            var viewId = $(this).attr('data-id');
            // alert(viewId)
            $.ajax({
                type: "POST",
                url: "{{ url('view-product-data') }}",
                data: {
                    viewId: viewId,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(response) {
                    console.log(response[0].product_gallary_image)
                    $('#view_product_category_name').html(response[0]['category']['category_name'])
                    $('#view_product_sub_category_name').html(response[0]['sub_category'][
                        'sub_category_name'
                    ])
                    $('#view_product_title').html(response[0]['title'])
                    $('#view_product_description').html(response[0]['description'])
                    $('#view_product_long_description').html(response[0]['long_description'])
                    $('#view_product_regular_price').html(response[0]['regular_price'])
                    $('#view_product_sale_price').html(response[0]['sale_price'])
                    $('#view_product_image').attr('src', 'http://127.0.0.1:8000/uploads/addProduct/' +
                        response[0]['image'])
                    // var gallaryData = response[0].product_gallary_image;
                    // var product_gallary_image = gallaryData.split(',');
                    // for(var i=0;i<product_gallary_image.length;i++){
                    //     console.log(gallaryData[i])
                    // }
                    // alert(product_gallary_image)
                    // $('#view_product_gallary_image').attr('src', product_gallary_image)
                }
            });
        });

        // view gallary of product 
        $('.viewGallary').click(function(e) {
            e.preventDefault();
            var gallaryId = $(this).attr('data-id');
            // alert(viewId)
            $.ajax({
                type: "POST",
                url: "{{ url('/admin/product/fetch-gallary-images') }}",
                data: {
                    gallaryId: gallaryId,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(response) {
                    // console.log(response)
                    $('#viewGallaryImages').html(response)
                }
            });
        });

        // product status change    
        $('.toggle-class').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var user_id = $(this).data('id');

            $.ajax({
                type: "POST",
                dataType: "json",
                url: '/change-product-status',
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

        // delete data of product
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
                        url: "/delete-product-data",
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
