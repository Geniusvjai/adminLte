@extends('admin.includes.layout')
@section('title', 'Edit Product')

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
                            <h1>Edit Product</h1>
                        </div>
                        <div class="col-sm-4">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="">Home</a></li>
                                <li class="breadcrumb-item active">Edit Product</li>
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
                            <div class="tab-pane" id="settings">
                                <form class="form-horizontal" action="{{ Route('update-banner') }}"   
                                    method="POST" enctype="multipart/form-data">
                                    @foreach ($showDataOnUpdatePage as $bannerData)
                                        <input type="hidden" name="banner_id" value="{{ $bannerData['id'] }}">
                                        @csrf

                                        <div class="row col-md-12">
                                            <div class="form-group row col-md-6">
                                                <label for="edit_banner_title" class="col-sm-4 col-form-label">banner Title</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="edit_banner_title" class="form-control"
                                                        id="edit_banner_title" value="{{ $bannerData['banner_title'] }}">
                                                    @if ($errors->has('edit_banner_title'))
                                                        <div class="text-danger">{{ $errors->first('edit_banner_title') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row col-md-6">
                                                <label for="edit_banner_description" class="col-sm-4 col-form-label">Banner
                                                    Description</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="edit_banner_description"
                                                        class="form-control" id="edit_banner_description"
                                                        value="{{ $bannerData['banner_description'] }}">
                                                    @if ($errors->has('edit_banner_description'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('edit_banner_description') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row col-md-6">
                                                <label for="edit_banner_image" class="col-sm-8 col-form-label">Banner
                                                    Image</label>
                                                <div class="col-sm-10">
                                                    <input type="file" name="edit_banner_image" class="form-control mb-2" id="edit_banner_image">
                                                    <img src="{{ asset('uploads/banner/' . $bannerData['banner_image']) }}" alt="" width="120px">
                                                    @if ($errors->has('edit_banner_image'))
                                                        <div class="text-danger">{{ $errors->first('edit_banner_image') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
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
