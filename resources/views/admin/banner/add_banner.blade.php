@extends('admin.includes.layout')
@section('title', 'Add Banner')

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
                            <h1>Add Banner</h1>
                        </div>
                        <div class="col-sm-4">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="">Home</a></li>
                                <li class="breadcrumb-item active">Add Banner</li>
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
                                <form class="form-horizontal" action="{{ Route('insert-banner') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="row col-md-12">

                                        <div class="form-group row col-md-6">
                                            <label for="banner_title" class="col-sm-4 col-form-label">Banner
                                                Title</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="banner_title" class="form-control"
                                                    id="banner_title" placeholder="Enter Banner Title"
                                                    value="{{ old('banner_title') }}">
                                                @if ($errors->has('banner_title'))
                                                    <div class="text-danger">{{ $errors->first('banner_title') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row col-md-6">
                                            <label for="banner_description" class="col-sm-4 col-form-label">Banner
                                                Description</label>
                                            <div class="col-sm-10">
                                                <textarea type="text" name="banner_description" class="form-control" id="banner_description"
                                                    placeholder="Enter Product Description" value="{{ old('banner_description') }}"></textarea>
                                                @if ($errors->has('banner_description'))
                                                    <div class="text-danger">{{ $errors->first('banner_description') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row col-md-6">
                                            <label for="banner_image" class="col-sm-8 col-form-label">Banner Image</label>
                                            <div class="col-sm-10">
                                                <input type="file" name="banner_image" class="form-control" id="banner_image">
                                                @if ($errors->has('banner_image'))
                                                    <div class="text-danger">
                                                        {{ $errors->first('banner_image') }}</div>
                                                @endif
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
